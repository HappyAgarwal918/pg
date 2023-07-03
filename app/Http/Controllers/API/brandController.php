<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\product;
use App\Models\productimage;
use DB;

class brandController extends Controller
{
    public function popularbrands($lat, $lon)
    {
        try {
            
            $data = User::where('is_admin', '1')
                        ->where('users.popular', '1')
                        ->select(
                            'users.id',
                            'users.name',
                            'users.email',
                            'users.brand_name',
                            'users.brand_image_path',
                            DB::raw("6371 * acos(cos(radians(" . $lat . ")) 
                            * cos(radians(users.latitude)) 
                            * cos(radians(users.longitude) - radians(" . $lon . ")) 
                            + sin(radians(" .$lat. ")) 
                            * sin(radians(users.latitude))) AS distance"))
                        ->having('distance','<=','15')
                        ->orderByRaw('updated_at DESC')
                        ->limit(12)->get();

            return response()->json([
                'status' => true,
                'message' => 'Brands',
                'data' => $data,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function brandProductlist($vendorid)
    {
        try {
                
            $data = User::where('id', $vendorid)
                    ->select(
                        'id',
                        'brand_name',
                        'brand_image_path',
                        'city',
                        'state',
                        'pin_code',
                        'latitude',
                        'longitude'
                    )->first();
            $data['products'] = product::where('user_id', $vendorid)
                    ->select(
                        'products.id',
                        'products.name as product_name',
                        'products.featured_image_path',
                    )->get();

            return response()->json([
                'status' => true,
                'message' => 'Products list',
                'data' => $data,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
