<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        // $this->create($request->all());

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
            'type' => decrypt($request->type),
        ]);

        if($user){

            Auth::login($user);

            return redirect("dashboard");

        }else{
            return back()->with('error', 'User not created');
        }
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'type' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'password' => Hash::make($data['password']),
            'type' => $data['type'],
        ]);
    }
}
