<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\properties;
use App\Models\wishlist;
use App\Models\User;

class propertyController extends Controller
{
    public function properties()
    {
        $wishlist = [];
        if (Auth()->user()) {
            $wishlist = wishlist::where('user_id', Auth()->user()->id)->get();
        }
        $data['properties'] = properties::get();
        
        return view('frontend.properties', compact('data', 'wishlist'));
    }

    public function propertydetail(Request $request, $id)
    {
        $decryptid = decrypt($id);
        
        $data = properties::where('id', $decryptid)->first();
        $data['room_type'] = explode(", ", $data->room_type);
        $data['amenities'] = explode(", ", $data->amenities);

        // echo "<pre>";print_r($data);die;
        
        return view('frontend.property_detail', compact('data'));
    }

    public function propertysearch(Request $request)
    {
        try{
            $wishlist = [];

            $data['properties'] = properties::where('name', 'LIKE', '%' .$request->search.'%')->orWhere('full_address', 'LIKE', '%' .$request->search. '%')->orWhere('locality', 'LIKE', '%' .$request->search.'%')->get();

            if (Auth()->user()) {
                $wishlist = wishlist::where('user_id', Auth()->user()->id)->get();
            }

            // echo"<pre>";print_r($data);die;

            return view('frontend.properties', compact('data', 'wishlist'));

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
                $data['properties'] = properties::where('name', 'LIKE', '%' .$dataval.'%')->orWhere('full_address', 'LIKE', '%' .$dataval. '%')->orWhere('locality', 'LIKE', '%' .$dataval.'%')->orderBy('created_at','desc')->get();
            }else{
                $data['properties'] = properties::where('name', 'LIKE', '%' .$dataval.'%')->orWhere('full_address', 'LIKE', '%' .$dataval. '%')->orWhere('locality', 'LIKE', '%' .$dataval.'%')->get();
            }
        }elseif($datasegment == 'vendor'){
            $vendor_id = decrypt($dataval);
            if($id == 'latest'){
                $data['properties'] = properties::where('user_id', $vendor_id)->orderBy('created_at','desc')->get();
            }else{
                $data['properties'] = properties::where('user_id', $vendor_id)->get();
            }
        }else{
            if($id == 'latest'){
                $data['properties'] = properties::latest()->get();
            }else{
                $data['properties'] = properties::get();
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

        return view('frontend.vendor-detail', compact('data','wishlist'));
    }
}
