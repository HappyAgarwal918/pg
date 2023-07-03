<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\package;
use App\Models\User;
use Carbon\Carbon;

class membershipController extends Controller
{
    public function activatemembership(Request $request)
    {   
        try{
            $user = Auth::user();

            //Validated
            $validateUser = Validator::make($request->all(), 
            [
                'package_id' => 'required',
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }
            $package = package::where('id', $request->package_id)->first();

            $data = User::where('id',$user->id)->first();
            
            $data->package_id = $package->id;
            if(isset($package) && $package->plan == 'Annual')
            {
                $data->package_expiry = Carbon::now()->addYear()->format('Y-m-d');
            }
            elseif(isset($package) && $package->plan == 'Monthly')
            {
                $data->package_expiry = Carbon::now()->addMonth()->format('Y-m-d');
            }
            $data -> update();

            return response()->json([
                    'status' => true,
                    'message' => 'Membership Activated',
                ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function membership()
    {
        try{
            $data = User::where('users.id', Auth::id())
                    ->leftjoin('package', 'package.id', 'users.package_id')
                    ->select(
                        'users.id',
                        'users.name as username',
                        'users.email',
                        'users.package_id',
                        'users.package_expiry',
                        'package.name as packagename',
                        'package.plan',
                        'package.regular_price',
                        'package.price'
                    )->first();

            return response()->json([
                    'status' => true,
                    'message' => 'Membership',
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
