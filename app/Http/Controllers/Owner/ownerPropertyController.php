<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\properties;
use Mail;
use App\Mail\DemoMail;

class ownerPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = properties::where('user_id', Auth()->user()->id)->get();

        return view('dashboard.owner.property.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.owner.property.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except(['_token']);

        if(!in_array('single', $data['room_type'])){
            $data['sb_room_count'] = NULL;
            $data['sb_bathroom_count'] = NULL;
            $data['sb_room_size'] = NULL;
            $data['sb_category'] = NULL;
            $data['sb_furnished_type'] = NULL;
            $data['sb_price'] = NULL;
        }
        if(!in_array('double', $data['room_type'])){
            $data['db_room_count'] = NULL;
            $data['db_bathroom_count'] = NULL;
            $data['db_room_size'] = NULL;
            $data['db_category'] = NULL;
            $data['db_furnished_type'] = NULL;
            $data['db_price'] = NULL;
        }
        if(!in_array('triple', $data['room_type'])){
            $data['tb_room_count'] = NULL;
            $data['tb_bathroom_count'] = NULL;
            $data['tb_room_size'] = NULL;
            $data['tb_category'] = NULL;
            $data['tb_furnished_type'] = NULL;
            $data['tb_price'] = NULL;
        }
        if(!in_array('four', $data['room_type'])){
            $data['fb_room_count'] = NULL;
            $data['fb_bathroom_count'] = NULL;
            $data['fb_room_size'] = NULL;
            $data['fb_category'] = NULL;
            $data['fb_furnished_type'] = NULL;
            $data['fb_price'] = NULL;
        }
        if($data['food'] == 'no'){
            $data['meal_type'] = NULL;

        }
        if(!in_array('parking', $data['amenities'])){
            $data['parking'] = NULL;
        }


        if ($request->filled(['room_type'])) 
        {
            $data['room_type'] = implode(', ', $data['room_type']);
        }

        if ($request->filled(['amenities'])) 
        {
            $data['amenities'] = implode(', ', $data['amenities']);
        }

        $data['user_id'] = Auth()->user()->id;
        
        // echo "<pre>";print_r($data);die;

        $user = properties::create($data);

        // if($user){

        //     $mailData = [
        //         'title' => 'Mail from Paying Guest',
        //         'body' => 'This is for testing email using smtp.'
        //     ];
             
        //     Mail::to(Auth()->user()->email)->cc('happyagarwal918@gmail.com')->send(new DemoMail($mailData));
        // }

        return back()->with('successful_message', 'Property created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pid = decrypt($id);

        $property = properties::where('id', $pid)->first();
        $property['room_type'] = explode(', ', $property->room_type);
        $property['amenities'] = explode(', ', $property->amenities);

        // echo "<pre>";print_r($property);die; 

        return view('dashboard.owner.property.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pid = decrypt($id);
        $data = properties::where('id', $pid)->first();
        $data['room_type'] = explode(", ", $data->room_type);
        $data['amenities'] = explode(", ", $data->amenities);

        return view('dashboard.owner.property.edit', compact('data'));
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
        $pid = decrypt($id);

        $property = properties::where('id', $pid);

        $data = $request->except(['_token', '_method','submit']);

        if(!in_array('single', $data['room_type'])){
            $data['sb_room_count'] = NULL;
            $data['sb_bathroom_count'] = NULL;
            $data['sb_room_size'] = NULL;
            $data['sb_category'] = NULL;
            $data['sb_furnished_type'] = NULL;
            $data['sb_price'] = NULL;
        }
        if(!in_array('double', $data['room_type'])){
            $data['db_room_count'] = NULL;
            $data['db_bathroom_count'] = NULL;
            $data['db_room_size'] = NULL;
            $data['db_category'] = NULL;
            $data['db_furnished_type'] = NULL;
            $data['db_price'] = NULL;
        }
        if(!in_array('triple', $data['room_type'])){
            $data['tb_room_count'] = NULL;
            $data['tb_bathroom_count'] = NULL;
            $data['tb_room_size'] = NULL;
            $data['tb_category'] = NULL;
            $data['tb_furnished_type'] = NULL;
            $data['tb_price'] = NULL;
        }
        if(!in_array('four', $data['room_type'])){
            $data['fb_room_count'] = NULL;
            $data['fb_bathroom_count'] = NULL;
            $data['fb_room_size'] = NULL;
            $data['fb_category'] = NULL;
            $data['fb_furnished_type'] = NULL;
            $data['fb_price'] = NULL;
        }
        if($data['food'] == 'no'){
            $data['meal_type'] = NULL;

        }
        if(!in_array('parking', $data['amenities'])){
            $data['parking'] = NULL;
        }

        if ($request->filled(['room_type'])) 
        {
            $data['room_type'] = implode(', ', $data['room_type']);
        }

        if ($request->filled(['amenities'])) 
        {
            $data['amenities'] = implode(', ', $data['amenities']);
        }

        $data['user_id'] = Auth()->user()->id;

        // echo "<pre>";print_r($data);die;

        $property->update($data);


        return redirect()->route('property.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // echo "hello";die;
        $pid = decrypt($id);
        $pg = properties::findorfail($pid);
    
        $pg->delete();

        return back();
    }
}
