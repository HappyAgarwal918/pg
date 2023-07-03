<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\properties;
use App\Models\vendorfeedback;
use App\Models\User;
use Auth;

class vendorFeedbackController extends Controller
{
    

    public function usersfeedback()
    {
        $id = Auth::user()->id;

        $data = vendorfeedback::where('vendor_id', $id)->with('feedbackuser')->get();

        return view('dashboard.feedback', compact('data'));
    }

    public function vendorreview(Request $request)
    {
        $data = $request->except('_token');
        $data['user_id'] = Auth()->user()->id;
        
        $user = vendorfeedback::create($data);

        return back()->with('successfull_message', 'Feedback added succesfully');
    }
}
