<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Models\category;
use App\Models\categoryvendor;
use Illuminate\Support\Facades\Validator;
use DB;

class CategoryController extends Controller
{
    public function showCategory()
    {
        try {

            $data = category::select(
                        'categories.id',
                        'categories.name',
                        'categories.image_path')
                    ->get();

            return response()->json([
                'status' => true,
                'message' => 'All Categories',
                'data' => $data,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function categorybrands($catid, $lat, $lon)
    {
        try {
            
            $data = category::where('categories.id', $catid)
                            ->select(
                                'categories.id',
                                'categories.name',
                            )
                            ->first();
            $data['vendors'] = categoryvendor::where('category_vendor.category_id', $catid)
                            ->join('users', 'users.id', 'category_vendor.user_id')
                            ->select(
                                'users.id',
                                'users.brand_name',
                                'users.brand_image_path',
                                DB::raw("6371 * acos(cos(radians(" . $lat . "))
                                * cos(radians(users.latitude)) 
                                * cos(radians(users.longitude) - radians(" . $lon . ")) 
                                + sin(radians(" .$lat. ")) 
                                * sin(radians(users.latitude))) AS distance"))
                            ->having('distance','<=','15')
                            ->orderBy('distance', 'asc')
                            ->get();

            if(count($data['vendors']) > '0')
            {
                return response()->json([
                    'status' => true,
                    'message' => 'Category Brands',
                    'data' => $data,
                ], 200);
            }else{
                return response()->json([
                    'status' => true,
                    'message' => 'No '.$data->name.' Brands found in your location.',
                ], 200);
            }

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
