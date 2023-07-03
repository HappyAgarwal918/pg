<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\product;
use App\Models\favorite;

class favoriteController extends Controller
{
    public function addFavorite($id)
    {
        try {
            if (auth()->check()) {
                if (!in_array($id, auth()->user()->favproduct->pluck('id')->toArray())) {
                    $product = product::find($id);
                    $user = auth()->user();
                    favorite::create([
                        'user_id' => $user->id,
                        'product_id' => $product->id,
                        'list' => 'favourite',
                    ]);

                    return response()->json([
                        'status' => true,
                        'message' => 'The product was successfully added to your list of favorite',
                    ], 200);
                }else{
                    return response()->json([
                        'status' => true,
                        'message' => 'The product was already in your favorite',
                    ], 200);
                }

            } else {
                return response()->json([
                    'status' => true,
                    'message' => 'To add to your favorites, you must first login',
                ], 200);
            }
        
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function showfavorite()
    {
        try{
            if (auth()->check()) {
                $data = auth()->user()->favproduct->toArray();

                return response()->json([
                    'status' => true,
                    'message' => 'Your favorite lists',
                    'data' => $data,
                ], 200);
            }else{
                return response()->json([
                    'status' => true,
                    'message' => 'Login to view your favorite lists',
                ], 200);
            }

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function destroyfavourite($id)
    {
        try {

            $data = favorite::where('user_id', auth()->user()->id)
                    ->where('product_id', $id)->first();
            if($data){
                $data->delete();
            }else{
                return response()->json([
                    'status' => true,
                    'message' => 'Product not in your favorite',
                ], 200);
            }

            return response()->json([
                'status' => true,
                'message' => 'Favorite removed Successfully',
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
