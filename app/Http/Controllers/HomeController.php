<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

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
            $user->password = bcrypt($request->password);
            $user->phone_number = $request->phone_number;
            $user->card_information = $request->card_information;
            $user->address = $request->address;

            $user->save();

            return back()->with(['success' => 'User created successfully']);
        } catch (Exception $e) {
            return back()
                ->withErrors(['error' => $e->getMessage()])
                ->withInput($request->except('password'));

            // return back()->with(['error' => $e->getMessage()])->withErrors();
            // return back()->with(['error' => $e->getMessage()]);
        }
    }
}
