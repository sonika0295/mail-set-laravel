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
use App\Models\Category;
use App\Models\Item;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $searchQuery = $request->input('search');
        $catid = $request->input('catid');
        $min_p = $request->input('min_p');
        $max_p = $request->input('max_p');
        $sdate = $request->input('sdate');
        $edate = $request->input('edate');

        $query = Item::query()->whereStatus('1');

        if ($searchQuery) {
            $query->where('name', 'LIKE', "%$searchQuery%")
                ->orWhere('price', 'LIKE', "%$searchQuery%")
                ->orWhere('description', 'LIKE', "%$searchQuery%");
        }

        if ($catid) {
            $query->whereCategory($catid);
        }

        if ($min_p) {
            $query->where('price', '>=', $min_p);
        }
        if ($max_p) {
            $query->where('price', '<=', $max_p);
        }

        if ($sdate) {
            $query->whereDate('created_at', '>=', $sdate);
        }
        if ($edate) {
            $query->whereDate('created_at', '<=', $edate);
        }

        $data = $query->paginate(9);

        return view('pages.home', compact('data'));
    }


    public function buy()
    {
        return view('pages.buy');
    }

    public function sell()
    {
        $categories = Category::whereStatus('1')->get();
        $items = Item::whereUserId(Auth::id())->orderByDesc('id')->paginate(5);

        return view('pages.sell.sell', compact('categories', 'items'));
    }

    public function request()
    {
        return view('pages.request');
    }

    public function setting()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        return view('pages.setting', compact('user'));
    }

    public function contact()
    {
        return view('contact');
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
                'email' => [
                    'required',
                    'email',
                    'max:255',
                    'unique:users,email',
                    'regex:/^[a-zA-Z0-9._%+-]+@monmouth\.edu$/i',
                    'not_regex:/@gmail\.com$/i',
                ],
                'password' => 'required',
                'phone_number' => 'required|numeric',
                'card_information' => 'required|numeric',
                'address' => 'required|string|max:255',
            ], [
                'email.regex' => 'The email must be in the format text@monmouth.edu.',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput($request->except('password'));
            }


            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone_number = $request->phone_number;
            $user->card_information = $request->card_information;
            $user->verification_code = rand(1000, 9999);
            $user->address = $request->address;

            $user->save();

            $encryptedUserId = Crypt::encrypt($user->id);
            // Mail::to($user->email)->send(new EmailVerification($user));
            // Mail::to('sonikakurmi48@gmail.com')->send(new EmailVerification($user));

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

            Auth::login($user);

            return redirect()->route('setting')->with('success', 'Email verified successfully!');
        } catch (Exception $e) {
            return back()->with(['error' => $e->getMessage()]);
        }
    }


    public function resend(Request $request)
    {
        try {
            $userId = decrypt($request->user_id);
            $user = User::findOrFail($userId);

            $user->verification_code = rand(1000, 9999);
            $user->save();

            // Mail::to($user->email)->send(new EmailVerification($user));
            // Mail::to('sonikakurmi48@gmail.com')->send(new EmailVerification($user));

            return response()->json(['message' => 'Code resent successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to resend code'], 500);
        }
    }


    public function login()
    {
        return view('pages.login');
    }


    public function loginSubmit(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users,email',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput($request->except('password'));
            }

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                if (!$user->email_verified_at) {
                    Auth::logout();
                    return redirect()->route('login')->with('error', 'Email not verified. Please check your email for verification instructions.');
                }

                if ($request->has('redirect')) {
                    $request->session()->put('url.intended', $request->input('redirect'));
                }

                return redirect()->intended(route('home'));
            }

            return redirect()->route('login')->with('error', 'Invalid credentials. Please try again.')->withInput($request->except('password'));
        } catch (Exception $e) {
            return back()
                ->with(['error' => $e->getMessage()]);
        }
    }


    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }


    public function settingUpdate(Request $request)
    {
        try {
            $user = Auth::user();

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'phone_number' => 'required|numeric',
                'address' => 'required|string|max:255',
                'card_information' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $user->name = $request->name;
            $user->phone_number = $request->phone_number;
            $user->address = $request->address;
            $user->card_information = $request->card_information;
            $user->save();

            return redirect()->route('setting')->with('success', 'Your details have been updated successfully!');
        } catch (Exception $e) {
            return back()
                ->with(['error' => $e->getMessage()]);
        }
    }
}
