<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {   
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        if(is_numeric($request->email)){
            if(auth()->attempt(array('mobile' => $input['email'], 'password' => $input['password'])))
            {
                // return $this->logintype();
                return redirect()->route('dashboard');

            }else{
                return redirect()->route('login')
                    ->with('error','Mobile Number And Password Are Wrong.');
            }
        }
        else
        {
            $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

            if($fieldType == 'email')
            {
                if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
                {
                    return redirect()->route('dashboard');

                }else{
                    return redirect()->route('login')
                        ->with('error','Email-Address And Password Are Wrong.');
                }
            }elseif($fieldType == 'username'){
                if(auth()->attempt(array($fieldType => $input['email'], 'password' => $input['password'])))
                {
                    return redirect()->route('dashboard');
                    
                }else{
                    return redirect()->route('login')
                        ->with('error','Username And Password Are Wrong.');
                }
            }
        }         
    }
}
