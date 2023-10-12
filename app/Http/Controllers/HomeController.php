<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.user.home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('admin.adminHome');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function brokerHome()
    {
        return view('dashboard.broker.brokerHome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function ownerHome()
    {
        return view('dashboard.owner.ownerHome');
    }

    public function dashboard()
    {
        if(auth()->user())
        {
            if (auth()->user()->mobile_verified_at == Null) {

                $SentTo=auth()->user()->mobile; ### Customer's phone number in International number format ( with leading + sign)

                ### Generate randon OTP
                $OTPValue=rand(1000,9999);
                session_start();
                $_SESSION['OTPSent']= $OTPValue;

                #### 2Factor Credentials
                $YourAPIKey=env('2FACTOR_SMS_KEY');

                ### Sending OTP to Customer's Number
                $agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
                $url = "https://2factor.in/API/V1/$YourAPIKey/SMS/$SentTo/$OTPValue/happitohelp";
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,$url); 
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_USERAGENT, $agent);
                $Response= curl_exec($ch); 

                $err = curl_error($ch);

                curl_close($ch);

                if ($err) {
                  echo "cURL Error #:" . $err;
                } 
                else {
                    $dateTime = Carbon::now()->timezone('Asia/Kolkata')->addMinutes(30);

                    $userotp = User::where('mobile', $SentTo)
                            ->update(['otp' => $OTPValue, 'otp_expiry' => $dateTime]);

                    return view('auth.verify-mobile', compact('SentTo'))->with('success','OTP sent successfully');
                }
            }
            else {
                if (auth()->user()->type == 'admin') {
                    return redirect()->route('admin.home');
                }else if (auth()->user()->type == 'broker') {
                    return redirect()->route('broker.home');
                }else if (auth()->user()->type == 'owner') {
                    return redirect()->route('owner.home');
                }else{
                    return redirect()->route('user.home');
                }
            }
        }
    }

    public function verifymobile(Request $request)
    {
        try{
            $dateTime = Carbon::now()->timezone('Asia/Kolkata');

            if(auth()->user()->otp_expiry >=  $dateTime)
            {
                if(auth()->user()->otp == $request->otp){
                    // auth()->login($user, true);
                    $data = User::where('mobile', $request->mobile)->update([
                        'otp' => null,
                        'otp_expiry' => null,
                        'mobile_verified_at' => Carbon::now(),
                    ]);

                    return redirect("dashboard");
                }
                else{
                    return back()->with('error', 'Invalid OTP');
                }
            }else{
                return $this->dashboard()->with('error', 'OTP Expired. Sended again');
            }
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
