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
    public function index()
    {
       
        return view('pages.home');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function course(Request $request, $type)
    {
        $searchQuery = $request->input('search');

        $query = Course::query();

        if ($searchQuery) {
            $query->where('name', 'LIKE', "%$searchQuery%")
                ->orWhere('description', 'LIKE', "%$searchQuery%");
        }


        $query->whereType($type)->whereStatus('1');

        $data = $query->get();

        return view($type, compact('data'));
    }

    public function courseDetails($type, $slug)
    {
        $data = Course::getCourseBySlug($type, $slug);
        $latest = Course::getLatestRecord($type);
        $detailPage = $type . 'Details';
        return view($detailPage, compact('data', 'latest'));
    }



    public function contactUs(Request $request)
    {
        $form_source =   $request->input('form_source') === 'footer' ? 'footer' : 'about_us';

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'description' => 'required|string',
            'contact_number' => 'numeric|digits_between:9,12',
            'form_source' => 'required|in:about_us,footer',
        ]);

        $table = new Contact();
        $table->name = $request->name;
        $table->email = $request->email;
        $table->description = $request->description;
        $table->contact_number = $request->contact_number;
        $table->save();

        return redirect()->back()->with(['status' => 'success', 'message' => 'Your Message has been sent successfully!', 'form_source' => $form_source]);
    }
}
