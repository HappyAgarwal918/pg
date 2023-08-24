<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\wishlist;
use App\Models\properties;

class wishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function wishlist()
    {
        $wishlist = [];
        
        $wishlist = wishlist::where('user_id', Auth()->user()->id)->get();

        $userwishlist = $wishlist->pluck('property_id')->toarray();

        $data['properties'] = properties::with([
                        'propertyimg' => function ($query) {
                            $query->where('excerpt', '1');
                         }
                    ])->whereIn('id',$userwishlist)->get();

            // echo "<pre>";print_r($data);die;
        return view('frontend.wishlist',compact('data', 'wishlist'));
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
