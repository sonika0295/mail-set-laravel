<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }


    public function signup()
    {
        return view('pages.signup');
    }


    public function signupSubmit(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email',
                'password' => 'required',
                'phone_number' => 'required|numeric',
                'card_information' => 'required|numeric',
                'address' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput($request->except('password'));
            }


            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);;
            $user->phone_number = $request->phone_number;
            $user->card_information = $request->card_information;
            $user->verification_code = rand(1000, 9999);
            $user->address = $request->address;

            $user->save();

            $encryptedUserId = Crypt::encrypt($user->id);
            Mail::to($user->email)->send(new EmailVerification($user));

            return redirect()->route('email.verify.form', ['user_id' => $encryptedUserId]);

            return back()->with(['success' => 'User created successfully']);
        } catch (Exception $e) {
            return back()
                ->with(['error' => $e->getMessage()])
                ->withInput($request->except('password'));
        }
    }

    public function emailVerifyForm($user_id)
    {
        try {
            $userId = Crypt::decrypt($user_id);
            $user = User::findOrFail($userId);
            return view('pages.email-verify', ['user' => $user]);
        } catch (Exception $e) {
            return redirect()->route('signup')->with(['error' => 'Invalid verification link']);
        }
    }



    public function emailVerify(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'verification_code' => 'required|string',
                'user_id' => 'required'
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }

            $userId = decrypt($request->user_id);
            $user = User::findOrFail($userId);

            if ($user->verification_code != $request->verification_code) {
                return back()->withErrors(['verification_code' => 'Invalid verification code']);
            }

            $user->email_verified_at = now();
            $user->save();

            return redirect()->route('home')->with('success', 'Email verified successfully!');
        } catch (Exception $e) {
            return back()->with(['error' => $e->getMessage()]);
        }
    }


    public function resend(Request $request)
    {
        try {
            $userId = decrypt($request->user_id);
            $user = User::findOrFail($userId);

            // Generate a new verification code
            $user->verification_code = rand(1000, 9999);
            $user->save();

            // Send the verification email
            Mail::to($user->email)->send(new EmailVerification($user));

            return response()->json(['message' => 'Code resent successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to resend code'], 500);
        }
    }
}
