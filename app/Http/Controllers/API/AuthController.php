<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Carbon\Carbon;
use Password;
use Mail;
use Log;
use App\Mail\DemoMail;

class AuthController extends Controller
{
    /**
     * Login The User
     * @param Request $request
     * @return User
     */

    public function loginUser(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if(is_numeric($request->email))
            {
                $user = User::where('mobile', $request->email)->first();
                if($user){
                    if(Hash::check($request->password, $user->password)){
                        if($user->mobile_verified_at != null){
                            return response()->json([
                                'status' => true,
                                'message' => 'User Logged In Successfully',
                                'token' => $user->createToken("authToken")->plainTextToken,
                                'user' => $user,
                            ], 200);
                        }
                        else{
                            return response()->json([
                                'status' => false,
                                'message' => 'Number not verified. Verify first.',
                                "resource" => url("/api/request_otp/{$user->mobile}"),
                            ], 200);
                        }
                    }
                    else{
                        return response()->json([
                        'status' => false,
                        'message' => 'Your Password is incorrect.',
                    ], 200);
                    }
                }
                else{
                    return response()->json([
                        'status' => false,
                        'message' => 'Number & Password does not match with our record.',
                    ], 200);
                }

            }else{
                $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
                if($fieldType == 'email')
                {
                    $this->validate($request, [
                        'email' => ['email'],
                    ]);

                    $user = User::where('email', $request->email)->first();
                    if($user){
                        if(Hash::check($request->password, $user->password)){
                            if($user->mobile_verified_at != null){
                                return response()->json([
                                    'status' => true,
                                    'message' => 'User Logged In Successfully',
                                    'token' => $user->createToken("authToken")->plainTextToken,
                                    'user' => $user,
                                ], 200);
                            }
                            else{
                                return response()->json([
                                    'status' => false,
                                    'message' => 'User not verified. Verify first.',
                                    "resource" => url("/api/request_otp/{$user->mobile}"),
                                ], 200);
                            }
                        }else{
                            return response()->json([
                                'status' => false,
                                'message' => 'Your Password is incorrect.',
                            ], 200);
                        }
                    }else{
                        return response()->json([
                            'status' => false,
                            'message' => 'Email & Password does not match with our record.',
                        ], 200);
                    }
                }elseif($fieldType == 'username'){

                    $user = User::where('username', $request->email)->first();
                    if($user){
                        if(Hash::check($request->password, $user->password)){
                            if($user->mobile_verified_at != null){
                                return response()->json([
                                    'status' => true,
                                    'message' => 'User Logged In Successfully',
                                    'token' => $user->createToken("authToken")->plainTextToken,
                                    'user' => $user,
                                ], 200);
                            }else{
                                return response()->json([
                                    'status' => false,
                                    'message' => 'User not verified. Verify first.',
                                    "resource" => url("/api/request_otp/{$user->mobile}"),
                                ], 200);
                            }
                        }else{
                            return response()->json([
                            'status' => false,
                            'message' => 'Your Password is incorrect.',
                        ], 200);
                        }
                    }else{
                        return response()->json([
                            'status' => false,
                            'message' => 'Username & Password does not match with our record.',
                        ], 200);
                    }
                }
            }

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        // Revoke the token that was used to authenticate the current request
        $request->user()->currentAccessToken()->delete();
        //$request->user->tokens()->delete(); // use this to revoke all tokens (logout from all devices)

        $arr = array("status" => 200, "message" => "Logged Out Successfully", "data" => array());
        return response()->json($arr);
    }

    public function verifyOtp(Request $request)
    {    
        $user  = User::where([['mobile','=',$request->mobile],['otp','=',$request->otp]])->first();
        if($user){
            auth()->login($user, true);
            User::where('mobile','=',$request->mobile)->update([
                'otp' => null,
                'mobile_verified_at' => now()
            ]);
            $accessToken = auth()->user()->createToken('authToken')->accessToken;

            return response([
                "status" => 200, 
                "message" => "Success", 
                'user' => auth()->user(), 
                'access_token' => $accessToken
            ]);
        }
        else{
            return response(["status" => 401, 'message' => 'Invalid']);
        }
    }

    public function reset_password(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required',
                'new_password' => 'required',
                'confirm_password' => 'required|same:new_password',
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }
            else {
                if(User::where('email', $request->email)->count() > 0)
                {
                    $user = User::where('email', $request->email)->update([
                        'password' => Hash::make($request->new_password)
                    ]);

                    return response()->json([
                        'status' => true,
                        'message' => 'Password reset successfully'
                    ], 200);
                }
                elseif(is_numeric($request->email) && User::where('mobile_no', $request->email)->count() > 0)
                {
                    $user = User::where('mobile_no', $request->email)->update([
                        'password' => Hash::make($request->new_password)
                    ]);

                    return response()->json([
                        'status' => true,
                        'message' => 'Password reset successfully'
                    ], 200);
                }
                else{
                    return response()->json([
                        'status' => false,
                        'message' => 'User not found'
                    ], 404);
                }
            }

        }
        catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function destroyuser($id)
    {
        try {

            $data = User::findOrFail($id);
            $data->delete();

            return response()->json([
                'status' => true,
                'message' => 'User deleted Successfully',
                'data' => $data,
                // 'token' => $data->createToken("API TOKEN")->plainTextToken,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function restoreuser($id)
    {
        try {

            $data=User::withTrashed()->find($id)->restore();

            return response()->json([
                'status' => true,
                'message' => 'User restored',
                'data' => $data,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function changename(Request $request)
    {
        try{
            $data = $request->except('_token');
            $user = Auth::user();
            if ($data['old_password']) {
                $this->validate($request, [
                    'old_password' => ['required', 'string', 'min:6', 'confirmed'],
                ]);
                if (Hash::check($data['old_password'], $user->password)) {
                    if (isset($data['name']) && $data['name'] != '') {
                        if ($data['name'] != $user->name) {
                            $this->validate($request, [
                                'name' => ['required'],
                            ]);
                            $user->name = $data['name'];

                            $user->save();

                            if ($user->save()) {

                                return response()->json([
                                    'status' => true,
                                    'message' => 'Username updated successfully.',
                                ], 200);
                            }
                        } else {
                            return response()->json([
                                'status' => false,
                                'message' => 'Use different Username.',
                            ], 500);
                        }
                    }
                }
                else {
                    return response()->json([
                        'status' => false,
                        'message' => 'Password is incorrect.',
                    ], 500);
                }
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function update_email(Request $request)
    {
        try {
            $data = $request->except('_token');
            $user = Auth::user();
            if ($data['old_password']) {
                $this->validate($request, [
                    'old_password' => ['required', 'string', 'min:6', 'confirmed'],
                ]);
                if (Hash::check($data['old_password'], $user->password)) {
                    if (isset($data['email']) && $data['email'] != '') {
                        if ($data['email'] != $user->email) {
                            $this->validate($request, [
                                'email' => ['string', 'email', 'max:255', 'unique:users'],
                            ]);
                            $user->email = $data['email'];

                            $user->save();
                            Auth::guard('web')->logout();

                            if ($user->save()) {

                                return response()->json([
                                    'status' => true,
                                    'message' => 'Email updated successfully.',
                                ], 200);
                            }
                        } else {
                            return response()->json([
                                'status' => false,
                                'message' => 'Use different email.',
                            ], 500);
                        }
                    }
                }
                else {
                    return response()->json([
                        'status' => false,
                        'message' => 'Password is incorrect.',
                    ], 500);
                }
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function update_password(Request $request)
    {
        try{
            $data = $request->except('_token');
            $user = Auth::user();
            if ($data['old_password']) {
                if (Hash::check($data['old_password'], $user->password)) {
                    $this->validate($request, [
                        'password' => ['required', 'string', 'min:6', 'confirmed'],
                    ]);
                    $user->password = Hash::make($data['password']);
                    if ($user->save()) {

                        return response()->json([
                            'status' => true,
                            'message' => 'Password updated successfully.',
                        ], 200);
                    }
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'Old password is incorrect.',
                    ], 500);
                }
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
