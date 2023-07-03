<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;
use App\Models\productimage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;

class searchController extends Controller
{
    public function getSearchResults($lat, $lon, $input) {

        try{

            $data['categories'] = category::join('category_vendor', 
                                'categories.id',
                                'category_vendor.category_id')
                                ->join('users', 'users.id', 'category_vendor.user_id')
                                ->where('categories.name', 'LIKE', '%'. $input. '%')
                                ->select(
                                    'categories.id',
                                    'categories.name',
                                    'categories.image_path',
                                    'users.brand_name',
                                    DB::raw("6371 * acos(cos(radians(" . $lat . "))
                                    * cos(radians(users.latitude)) 
                                    * cos(radians(users.longitude) - radians(" . $lon . ")) 
                                    + sin(radians(" .$lat. ")) 
                                    * sin(radians(users.latitude))) AS distance"))
                                ->having('distance','<=','15')
                                ->orderBy('distance', 'asc')
                                ->get();
            $data['products'] = product::join('users', 'users.id', 'products.user_id')
                                ->where('products.name', 'LIKE', '%'. $input. '%')
                                ->orWhere('products.description', 'LIKE', '%'. $input. '%')
                                ->orWhere('products.specification', 'LIKE', '%'. $input. '%')
                                ->select(
                                    'products.id',
                                    'products.name as product_name',
                                    'products.description',
                                    'products.specification',
                                    'products.featured_image_path',
                                    DB::raw("6371 * acos(cos(radians(" . $lat . "))
                                    * cos(radians(users.latitude)) 
                                    * cos(radians(users.longitude) - radians(" . $lon . ")) 
                                    + sin(radians(" .$lat. ")) 
                                    * sin(radians(users.latitude))) AS distance"))
                                ->having('distance','<=','15')
                                ->orderBy('distance', 'asc')
                                ->get();
            $data['brands'] = User::where('users.brand_name', 'LIKE', '%'. $input. '%')
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
                                ->orderBy('distance', 'asc')
                                ->get();
            if(count($data)){
                return response()->json([
                    'status' => true,
                    'message' => 'Search data',
                    'input' => $data,
                ], 200);
            }
            else
            {
                return response()->json([
                    'status' => true,
                    'message' => 'No Data not found'
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
