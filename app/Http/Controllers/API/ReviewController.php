<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\product;
use App\Models\reviews;

class ReviewController extends Controller
{
    public function productreview(Request $request, $productid)
    {
        try{

            //Validated
            $validateUser = Validator::make($request->all(),
            [
                'review' => 'required',
                'rating' => 'required',
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = Auth::user();

            $data = reviews::create([
                'review' => $request->review,
                'rating' => $request->rating,
                'product_id' => $productid,
                'user_id' => $user->id,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Product Reviewed',
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function showreview($productid)
    {
        try{

            $data = reviews::where('product_id', $productid)
                    ->join('users', 'users.id', 'user_id')
                    ->select(
                        'review_product.review',
                        'review_product.rating',
                        'users.name',
                    )
                    ->get();

            return response()->json([
                'status' => true,
                'message' => 'Reviews',
                'data' => $data,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function showrating($productid)
    {
        try{

            $data = reviews::where('product_id', $productid)
                    ->avg('rating');

            return response()->json([
                'status' => true,
                'message' => 'Product Rating',
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
