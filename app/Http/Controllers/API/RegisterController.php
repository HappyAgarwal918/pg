<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function createUser(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(), 
            [
                'username' => 'required',
                'mobile' => 'required|unique:users,mobile_no',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'type' => 'required',
                'confirm_password' => 'required|same:password',
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::create([
                'username' => $request->username,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'type' => $request->type,
            ]);

            if($user){

                $SentTo=$request->mobile; ### Customer's phone number in International number format ( with leading + sign)

                ### Generate randon OTP
                $OTPValue=rand(1000,9999);
                // session_start();
                // $_SESSION['OTPSent']= $OTPValue;

                // #### 2Factor Credentials
                // $YourAPIKey=env('2FACTOR_SMS_KEY');

                // ### Sending OTP to Customer's Number
                // $agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
                // $url = "https://2factor.in/API/V1/$YourAPIKey/SMS/$SentTo/$OTPValue";
                // $ch = curl_init(); 
                // curl_setopt($ch, CURLOPT_URL,$url); 
                // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                // curl_setopt($ch, CURLOPT_USERAGENT, $agent);
                // $Response= curl_exec($ch); 

                // $err = curl_error($ch);

                // curl_close($ch);

                // if ($err) {
                //   echo "cURL Error #:" . $err;
                // }
                // else {

                    $dateTime = Carbon::now()->timezone('Asia/Kolkata')->addMinutes(30);

                    $userotp = User::where('mobile', $SentTo)
                            ->update(['otp' => $OTPValue, 'otp_expiry' => $dateTime]);

                    return response()->json([
                        'status' => true,
                        'message' => 'User Created & OTP sent successfully',
                        'token' => $user->createToken("API TOKEN")->plainTextToken,
                        'username' => $user->username,
                        'OTP' => $OTPValue,
                    ], 200);
                // }
            }

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function requestOtp(Request $request, $mobno)
    {
        try {

            if(is_numeric($mobno)){
                $SentTo = $mobno;
            }else{
                $fieldType = filter_var($mobno, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
                if($fieldType == 'email'){
                    $user = User::where('email', $fieldType)->first();
                    if($user){
                        $SentTo = $user->mobile;
                    }else{
                        return response()->json([
                            'status' => false,
                            'message' => 'User not found'
                        ], 404);
                    }
                    
                }elseif($fieldType == 'username'){
                    $user = User::where('username', $fieldType)->first();
                    if($user){
                        $SentTo = $user->mobile;
                    }else{
                        return response()->json([
                            'status' => false,
                            'message' => 'User not found'
                        ], 404);
                    }
                }
            }            

            ### Generate randon OTP
            $OTPValue=rand(1000,9999);
            // session_start();
            // $_SESSION['OTPSent']= $OTPValue;

            // #### 2Factor Credentials
            // $YourAPIKey=env('2FACTOR_SMS_KEY');

            // ### Sending OTP to Customer's Number
            // $agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
            // $url = "https://2factor.in/API/V1/$YourAPIKey/SMS/$SentTo/$OTPValue/OTPforLogin";
            // // echo "<pre>";print_r($url);die;
            // $ch = curl_init(); 
            // curl_setopt($ch, CURLOPT_URL,$url); 
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            // curl_setopt($ch, CURLOPT_USERAGENT, $agent);
            // $Response= curl_exec($ch); 

            // $err = curl_error($ch);

            // curl_close($ch);

            // if ($err) {
            //   echo "cURL Error #:" . $err;
            // } else {
                $dateTime = Carbon::now()->timezone('Asia/Kolkata')->addMinutes(30);

                    $userotp = User::where('mobile', $SentTo)
                            ->update(['otp' => $OTPValue, 'otp_expiry' => $dateTime]);

                return response([
                    "status" => 200, 
                    "message" => "OTP sent successfully",
                    'OTP' => $OTPValue,
                ]);
            // }      
        }
        catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
