<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\properties;
use App\Models\wishlist;
use App\Models\User;
use App\Models\propertyImg;
use File;
use App\Models\vendorfeedback;
use App\Models\tenants;

class propertyController extends Controller
{
    public function properties()
    {
        $wishlist = [];
        if (Auth()->user()) {
            $wishlist = wishlist::where('user_id', Auth()->user()->id)->get();
        }
        $data['properties'] = properties::with([
                        'propertyimg' => function ($query) {
                            $query->where('excerpt', '1');
                         }
                    ])->get();

        $tenants = tenants::get();
        
        return view('frontend.properties', compact('data', 'wishlist', 'tenants'));
    }

    public function propertydetail(Request $request, $id)
    {
        $decryptid = decrypt($id);
        
        $data = properties::where('id', $decryptid)->with('propertyimg')->first();
        $data['room_type'] = explode(", ", $data->room_type);
        $data['amenities'] = explode(", ", $data->amenities);

        // echo "<pre>";print_r($data);die;
        
        return view('frontend.property_detail', compact('data'));
    }

    public function propertysearch(Request $request)
    {
        try{
            $wishlist = [];

            $data['properties'] = properties::where('name', 'LIKE', '%' .$request->search.'%')->orWhere('full_address', 'LIKE', '%' .$request->search. '%')->orWhere('locality', 'LIKE', '%' .$request->search.'%')->with([
                        'propertyimg' => function ($query) {
                            $query->where('excerpt', '1');
                         }
                    ])->get();

            if (Auth()->user()) {
                $wishlist = wishlist::where('user_id', Auth()->user()->id)->get();
            }

            // echo"<pre>";print_r($data);die;
            $tenants = tenants::get();

            return view('frontend.properties', compact('data', 'wishlist', 'tenants'));

        }

        catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function sortBy(Request $request)
    {

        $id = $request->id;
        $wishlist = [];
        if (Auth()->user()) {
            $wishlist = wishlist::where('user_id', Auth()->user()->id)->get();
        }

        $datasegment = $request->datasegment;
        $dataval = $request->dataval;

        if($datasegment == 'search'){
            if($id == 'latest'){
                $data['properties'] = properties::where('name', 'LIKE', '%' .$dataval.'%')->orWhere('full_address', 'LIKE', '%' .$dataval. '%')->orWhere('locality', 'LIKE', '%' .$dataval.'%')->orderBy('created_at','desc')->with([
                        'propertyimg' => function ($query) {
                            $query->where('excerpt', '1');
                         }
                    ])->get();
            }else{
                $data['properties'] = properties::where('name', 'LIKE', '%' .$dataval.'%')->orWhere('full_address', 'LIKE', '%' .$dataval. '%')->orWhere('locality', 'LIKE', '%' .$dataval.'%')->with([
                        'propertyimg' => function ($query) {
                            $query->where('excerpt', '1');
                         }
                    ])->get();
            }
        }elseif($datasegment == 'vendor'){
            $vendor_id = decrypt($dataval);
            if($id == 'latest'){
                $data['properties'] = properties::where('user_id', $vendor_id)->with([
                        'propertyimg' => function ($query) {
                            $query->where('excerpt', '1');
                         }
                    ])->orderBy('created_at','desc')->get();
            }else{
                $data['properties'] = properties::where('user_id', $vendor_id)->with([
                        'propertyimg' => function ($query) {
                            $query->where('excerpt', '1');
                         }
                    ])->get();
            }
        }else{
            if($id == 'latest'){
                $data['properties'] = properties::with([
                    'propertyimg' => function ($query) {
                        $query->where('excerpt', '1');
                     }
                ])->latest()->get();
            }else{
                $data['properties'] = properties::with([
                    'propertyimg' => function ($query) {
                        $query->where('excerpt', '1');
                     }
                ])->get();
            }
        }
        
        $property = view('frontend.property_data', compact('data', 'wishlist'))->render();

        return response($property);
    }

    public function vendors()
    {
        $data = User::where('type', 2)
                        ->orWhere('type', 3)
                        ->with('properties')->get();

        return view('frontend.vendors', compact('data'));
    }

    public function vendordetail($id)
    {
        $wishlist = [];
        $vendor_id = decrypt($id);

        $data = User::where('id', $vendor_id)->with('properties')->first();
        if (Auth()->user()) {
            $wishlist = wishlist::where('user_id', Auth()->user()->id)->get();
        }

        $vendor = vendorfeedback::where('vendor_id', $vendor_id)->get();
        
        $rating = $vendor->avg('rating');

        return view('frontend.vendor-detail', compact('data','wishlist', 'rating'));
    }

    public function deletepropertyimg(Request $request)
    {
        $imgid = $request->id-785;

        $imgdata = propertyImg::where('id', $imgid)->first();

        $fullImgPath = public_path("property_img/$imgdata->name");
        if(File::exists($fullImgPath)) {
            File::delete($fullImgPath);
        }

        $imgdata->delete();

        return response()->json([
            'error' => false,
            'imgdata'  => $imgdata,
        ], 200);
    }

    public function uploadpropertyimg(Request $request, $id)
    {
        $upload = [];
        $destinationPath = public_path('property_img');
        foreach ($request->file('upload') as $propertyimg) {
            $input['images'] = time().rand(1,99).'.'.$propertyimg->extension();
            $propertyimg->move($destinationPath, $input['images']);

            $upload[]['name'] = $input['images'];

            $img = propertyImg::create([
                'name'=> $input['images'],
                'img_src'=> 'property_img/'.$input['images'],
                'property_id'=> $id,
            ]);
        }
        
        return back()->with('successfull_message', 'Images Updated Successfully');
    }
}
