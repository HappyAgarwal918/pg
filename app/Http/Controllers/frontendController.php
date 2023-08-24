<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sponser;
use App\Models\testimonial;
use App\Models\User;
use App\Models\contact;
use App\Models\properties;
use App\Models\wishlist;
use App\Models\mailchimp;
use Carbon\Carbon;
use Stevebauman\Location\Facades\Location;
use Mail;
use App\Mail\DemoMail; 

class frontendController extends Controller
{
    public function index()
    {
        $wishlist = [];
        $data['testimonial'] = testimonial::get();
        $data['properties'] = properties::with('propertyuser')->with([
            'propertyimg' => function ($query) {
                $query->where('excerpt', '1');
             }
        ])->latest()->limit(6)->get();
        $data['vendors'] = User::where('type', 2)->orWhere('type', 3)->get();
        if (Auth()->user()) {
            $wishlist = wishlist::where('user_id', Auth()->user()->id)->get();
        }

        return view('frontend.index', compact('data', 'wishlist'));
    }

    public function aboutUs()
    {
        $data['sponser'] = sponser::get();
        $data['agents'] = User::where('type', 2)->limit(4)->get();

        return view('frontend.about_us', compact('data'));
    }

    public function contactUs()
    {
        $data['sponser'] = sponser::get();

        return view('frontend.contact_us', compact('data'));
    }

    public function contactSave(Request $request)
    {
        $data = $request->except(['_token']);

        $data = contact::create($data);

        $mailData = [
            'name' => $data->name,
            'email' => $data->email,
            'subject' => $data->subject,
            'phone_number' => $data->phone_number,
            'message' => $data->message,
        ];
         
        Mail::to('happitohelp001@gmail.com')->send(new DemoMail($mailData));

        return back()->with('success', 'Form Submitted Successfully');
    }

    public function privacy()
    {
        return view('frontend.privacy');
    }

    public function tandc()
    {
        return view('frontend.termcondition');
    }

    public function blogs()
    {
        $data['sponser'] = sponser::get();
        
        return view('frontend.blogs', compact('data'));
    }

    public function gallery()
    {
        return view('frontend.gallery');
    }

    public function display(Request $request)
    {
        /* $ip = $request->ip(); Dynamic IP address */
        $ip = '122.173.28.156'; /* Static IP address */
        $currentUserInfo = Location::get($ip);

        // echo "<pre>";print_r($currentUserInfo);die;
          
        return view('user', compact('currentUserInfo'));
    }

    public function mailchimp(Request $request)
    {
        $data = $request->except('_token');

        $user = mailchimp::create($data);

        return back();
    }
}
