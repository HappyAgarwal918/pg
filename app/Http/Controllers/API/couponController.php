<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Models\product;
use App\Models\couponclaims;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Mail;
use App\Mail\CouponMail;

class couponController extends Controller
{    
    public function couponclaim(Request $request)
    {
        try {

            $user = Auth::user();

            //Validated
            $validateUser = Validator::make($request->all(),
            [
                'product_id' => 'required',
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }


            $couponclaims = couponclaims::where('product_id', $request->product_id)
                            ->where('user_id', $user->id)
                            ->count();

            // echo "<pre>";print_r($couponclaims);die;

            $coupon = product::where('products.id', $request->product_id)
                      ->join('users', 'products.user_id', 'users.id')
                      ->select(
                        'products.id',
                        'products.user_id as vendor_id',
                        'products.coupon_code',
                        'users.name as vendor_name',
                        'users.email as vendor_email')
                      ->first();
            
            if ($couponclaims == 0) {   
                $data = couponclaims::create([
                    'user_id' => $user->id,
                    'product_id' => $request->product_id,
                ]);

                $mailData = [
                    'subject' => 'Coupon Code',
                    'body' => $coupon->coupon_code,
                ];
               
                Mail::to($user->email)
                    ->bcc($coupon->vendor_email)
                    ->send(new CouponMail($mailData));

                return response()->json([
                    'status' => true,
                    'message' => 'Coupon Claimed Successfully',
                    'data' => $coupon,
                ], 200);
            }else{
                return response()->json([
                    'status' => true,
                    'message' => 'Coupon Already Claimed',
                    'data' => $coupon,
                ], 208);
            }

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
