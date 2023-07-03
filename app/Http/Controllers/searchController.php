<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\properties;
use App\Models\wishlist;

class searchController extends Controller
{
    public function search(Request $request)
    {
        try{
            $data = $request->search;
            $wishlist = [];

            $search = properties::where('name', 'LIKE', '%' .$data.'%')->orWhere('full_address', 'LIKE', '%' .$data. '%')->orWhere('locality', 'LIKE', '%' .$data.'%')->get();

            if (Auth()->user()) {
                $wishlist = wishlist::where('user_id', Auth()->user()->id)->get();
            }

            // echo"<pre>";print_r($search);die;

            return view('frontend.search-page', compact('search', 'wishlist'));

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
        if($id == 'latest'){
            $data['properties'] = properties::with('propertyuser')->latest()->get();
        }else{
            $data['properties'] = properties::with('propertyuser')->get();
        }
        if (Auth()->user()) {
            $wishlist = wishlist::where('user_id', Auth()->user()->id)->get();
        }

        $property = view('frontend.property_data', compact('data', 'wishlist'))->render();

        return response($property);
    }
}
