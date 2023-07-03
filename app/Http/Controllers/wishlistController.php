<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\wishlist;

class wishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function wishlist()
    {
        $data = wishlist::where('wishlist.user_id', Auth()->user()->id)
                               ->leftjoin('properties', 'wishlist.property_id', 'properties.id')
                               ->select(
                                    'wishlist.user_id',
                                    'wishlist.property_id',
                                    'properties.name', 
                                    'properties.locality', 
                                    'properties.full_address', 
                                    'properties.room_type', 
                                    'properties.sb_room_count', 
                                    'properties.sb_bathroom_count', 
                                    'properties.sb_room_size', 
                                    'properties.sb_category', 
                                    'properties.sb_furnished_type', 
                                    'properties.sb_price', 
                                    'properties.db_room_count', 
                                    'properties.db_bathroom_count', 
                                    'properties.db_room_size', 
                                    'properties.db_category',
                                    'properties.db_furnished_type',
                                    'properties.db_price', 
                                    'properties.tb_room_count', 
                                    'properties.tb_bathroom_count', 
                                    'properties.tb_room_size', 
                                    'properties.tb_category', 
                                    'properties.tb_furnished_type', 
                                    'properties.tb_price', 
                                    'properties.fb_room_count', 
                                    'properties.fb_bathroom_count', 
                                    'properties.fb_room_size', 
                                    'properties.fb_category', 
                                    'properties.fb_furnished_type', 
                                    'properties.fb_price', 
                                    'properties.food', 
                                    'properties.meal_type', 
                                    'properties.tenant', 
                                    'properties.amenities', 
                                    'properties.parking',
                                    'properties.user_id as property_vendor'
                                    )
                               ->get();

        // echo "<pre>";print_r($data);die;

        return view('frontend.wishlist',compact('data'));
    }

    public function addtowishlist(Request $request)
    {
        $data['property_id'] = $request->id;
        $data['user_id'] = Auth::user()->id;

        $properties = wishlist::where('user_id', Auth()->user()->id)
                    ->where('property_id', $request->id)->first();

        if($properties){
            $user = wishlist::findOrfail($properties->id);
            $user->delete();
        }else{
            $user = wishlist::create($data);
        }

        return response($user);
    }
}
