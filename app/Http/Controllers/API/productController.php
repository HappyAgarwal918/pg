<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Models\product;
use App\Models\productimage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\reviews;
use App\Models\favorite;

class productController extends Controller
{
    public function showProductlist($catid, $vendorid)
    {
        try {
                $data = User::where('users.id', $vendorid)
                    ->join(
                        'category_vendor',
                        'category_vendor.user_id',
                        'users.id')
                    ->join(
                        'categories',
                        'categories.id',
                        'category_vendor.category_id',)
                    ->where('categories.id', $catid)
                    ->select(
                        'categories.id as category_id',
                        'categories.name as category_name',
                        'brand_name',
                        'brand_image_path',
                        'city',
                        'state',
                        'pin_code',
                        'latitude',
                        'longitude')
                    ->first();
                $data['products'] = product::where('user_id', $vendorid)
                    ->select(
                        'products.id',
                        'products.name as product_name',
                        'products.featured_image_path',
                    )->get();

            return response( )->json([
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

    public function showProduct($productid)
    {
        try {
            $user = Auth()->user();

            $data = product::where('products.id', $productid)
                    ->join(
                        'categories',
                        'categories.id',
                        'products.category_id')
                    ->join(
                        'users',
                        'users.id',
                        'products.user_id')
                    ->select(
                        'products.id',
                        'products.name as product_name',
                        'products.price',
                        'products.description',
                        'products.specification',
                        'products.coupon_code',
                        'categories.name as category_name',
                        'users.brand_name',
                        'users.city',
                        'users.state',
                        'users.pin_code',
                        'users.latitude',
                        'users.longitude')
                    ->first();
            $data['images'] = productimage::where('product_id', $productid)
                              ->select('id', 'product_image_name', 'product_image_path')
                              ->get();

            $data['reviews'] = reviews::where('product_id', $productid)
                               ->join('users', 'users.id', 'user_id')
                               ->select(
                                   'review_product.review',
                                   'review_product.rating',
                                   'users.name',)
                               ->get();

            $data['avg-rating'] = reviews::where('product_id', $productid)
                              ->avg('rating');
            $favorites = favorite::where('product_id', $productid)
                        ->where('user_id', $user->id)
                        ->count();
            if($favorites >= 1){
                $data['favorites'] = true;
            }else{
                $data['favorites'] = false;
            }

            return response()->json([
                'status' => true,
                'message' => 'Products',
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
