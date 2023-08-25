<?php

namespace App\Http\Controllers\Broker;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Models\properties;
use Mail;
use App\Mail\DemoMail;

class brokerPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data1 = properties::where('user_id', Auth()->user()->id)->with([
            'propertyimg' => function ($query) {
                $query->where('excerpt', '1');
             }
        ])->get();

        return view('dashboard.broker.property.index', compact('data1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.broker.property.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illumin ate\Http\Request  $request
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

        $user = properties::create($data);

        if($user){
            $excerpt_img = $request->file('excerpt_img');
            $input['imagename'] = time().'.'.$excerpt_img->extension();

            $destinationPath = public_path('property_img');
            $excerpt_img->move($destinationPath, $input['imagename']);

            $imgdata = propertyImg::create([
                'name'=> $input['imagename'],
                'img_src'=> 'property_img/'.$input['imagename'],
                'excerpt'=> '1',
                'property_id'=> $user['id'],
            ]);

            $upload = [];
            foreach ($request->file('upload') as $propertyimg) {
                $input['images'] = time().rand(1,99).'.'.$propertyimg->extension();
                $propertyimg->move($destinationPath, $input['images']);

                $upload[]['name'] = $input['images'];

                $img = propertyImg::create([
                    'name'=> $input['images'],
                    'img_src'=> 'property_img/'.$input['images'],
                    'property_id'=> $user['id'],
                ]);
            }
                 
        }

        if($user){

            $mailData = [
                'title' => 'Mail from '.env('APP_NAME'),
                'body' => 'Property added Successfully'
            ];
             
            Mail::to(Auth()->user()->email)->cc('info@happitohelp.com')->send(new DemoMail($mailData));
        }

        return redirect()->route('broker.property.index')->with('successful_message', 'Property created successfully');
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

        $property = properties::where('id', $pid)->with([
            'propertyimg' => function ($query) {
                $query->where('excerpt', '1');
             }
        ])->first();
        $property['room_type'] = explode(", ", $property->room_type);
        $property['amenities'] = explode(", ", $property->amenities);
        $property['image'] = propertyImg::where('property_id', $pid)->where('excerpt', 0)->get();
        
        return view('dashboard.broker.property.show', compact('property'));
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

        $data = properties::where('id', $pid)->with([
            'propertyimg' => function ($query) {
                $query->where('excerpt', '1');
             }
        ])->first();
        $data['room_type'] = explode(', ', $data->room_type);
        $data['amenities'] = explode(', ', $data->amenities);
        $data['image'] = propertyImg::where('property_id', $pid)->where('excerpt', 0)->get();
        
        return view('dashboard.broker.property.edit', compact('data'));
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

        $data = $request->except(['_token', '_method','excerpt_img','submit']);

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

        if($request->file('excerpt_img')){
            $excerpt_img = $request->file('excerpt_img');
            $input['imagename'] = time().'.'.$excerpt_img->extension();

            $destinationPath = public_path('property_img');
            $excerpt_img->move($destinationPath, $input['imagename']);

            $imgdata = propertyImg::where('property_id', $pid)
            ->where('excerpt', '1')
            ->update([
                'name'=> $input['imagename'],
                'img_src'=> 'property_img/'.$input['imagename'],
            ]);
        }


        return redirect()->route('broker.property.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pid = decrypt($id);
        $pg = properties::findorfail($pid);

        $pg->delete();

        return back();
    }
}
