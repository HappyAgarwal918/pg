<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\vendorfeedback;
use Auth;

class feedbackVendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::User()->id;

        $data = vendorfeedback::where('user_id', $id)->with('feedback_vendor')->get();

        return view('dashboard.user.feedback.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['user_id'] = Auth()->user()->id;

        // echo "<pre>";print_r($data);die;
        
        $user = vendorfeedback::create($data);

        return back()->with('successfull_message', 'Feedback added succesfully');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feedback_id = decrypt($id);

        $data = vendorfeedback::where('id', $feedback_id)->first();

        echo"<pre>";print_r($data);die;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedbackid = decrypt($id);

        $feedback = vendorfeedback::findorfail($feedbackid);

        $feedback->delete();

        return back();

    }
}
