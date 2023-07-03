<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use DB;

class dealsController extends Controller
{
    public function topdeals($lat, $lon)
    {
        try {

            $data = product::join(
                        'categories',
                        'categories.id',
                        'products.category_id')
                    ->join('users', 'users.id', 'products.user_id')
                    ->select(
                        'products.id',
                        'products.name as product_name',
                        'products.description',
                        'products.featured_image_path',
                        DB::raw("6371 * acos(cos(radians(" . $lat . ")) 
                        * cos(radians(users.latitude)) 
                        * cos(radians(users.longitude) - radians(" . $lon . ")) 
                        + sin(radians(" .$lat. ")) 
                        * sin(radians(users.latitude))) AS distance")
                    )
                    ->having('distance','<=','15')
                    ->orderByRaw('products.updated_at DESC')
                    ->limit(12)->get();
            if(count($data)){
                return response()->json([
                    'status' => true,
                    'message' => 'Top Deals',
                    'data' => $data,
                ], 200);
            }else{
                return response()->json([
                    'status' => true,
                    'message' => 'No Top Deals',
                ], 200);
            }

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function nearbydeals($lat, $lon)
    {
        try {

            $data = product::join(
                        'categories',
                        'categories.id',
                        'products.category_id')
                    ->join('users', 'users.id', 'products.user_id')
                    ->select(
                        'products.id',
                        'products.name as product_name',
                        'products.description',
                        'products.featured_image_path',
                        DB::raw("6371 * acos(cos(radians(" . $lat . ")) 
                        * cos(radians(users.latitude)) 
                        * cos(radians(users.longitude) - radians(" . $lon . ")) 
                        + sin(radians(" .$lat. ")) 
                        * sin(radians(users.latitude))) AS distance")
                    )
                    ->having('distance','<=','15')
                    ->orderBy('distance', 'asc')
                    ->limit(12)->get();

            if(count($data)){
                return response()->json([
                    'status' => true,
                    'message' => 'Nearby Deals',
                    'data' => $data,
                ], 200);
            }else{
                return response()->json([
                    'status' => true,
                    'message' => 'No Nearby Deals',
                ], 404);
            }

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
