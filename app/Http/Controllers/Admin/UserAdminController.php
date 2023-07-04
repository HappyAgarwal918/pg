<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Carbon\Carbon;
use Password;

class UserAdminController extends Controller
{
    public function user()
    {
        $data = User::where('type', 0)->get();

        return view('admin.users', compact('data'));
    }

    public function broker()
    {
        $data = User::where('type', 2)->get();

        return view('admin.brokers', compact('data'));
    }

    public function owner()
    {
        $data = User::where('type', 3)->get();
        
        return view('admin.owners', compact('data'));
    }

    public function newuser(Request $request)
    {
        return view('admin.add_new_user');
    }

    public function edit($key)
    {
        $id = decrypt($key);
        // echo "<pre>";print_r($id);die;
        $data = User::where('id', $id)->first();

        return view('admin.editUser', compact('data'));
    }

    public function destroy($key)
    {
        $id = decrypt($key);
        $data = User::findOrFail($id);
        $data->delete();

        return back()->with('successful_message', 'User Deleted Successfully.');
    }

    public function update_name(Request $request)
    {
        try{
            $data = $request->except('_token');
            $user = User::where('id', $data['user_id'])->first();
            
            if (isset($data['name']) && $data['name'] != '') {
                if ($data['name'] != $user->name) {
                    $this->validate($request, [
                        'name' => ['required'],
                    ]);
                    $user->name = $data['name'];
                    $user->save();
                    if ($user->save()) {
                        return back()->with('successful_message', 'Username updated successfully.');
                    }
                } else {
                    return back()->with('error_message', 'Use different Username.');
                }
            }
        } catch (\Throwable $th) {
            return back()->with('error_message', $th->getMessage());
        }
    }

    public function update_email(Request $request)
    {
        try {
            $data = $request->except('_token');
            $user = User::where('id', $data['user_id'])->first();
            
            if (isset($data['email']) && $data['email'] != '') {
                if ($data['email'] != $user->email) {
                    $this->validate($request, [
                        'email' => ['string', 'email', 'max:255', 'unique:users'],
                    ]);
                    $user->email = $data['email'];

                    $user->save();

                    if ($user->save()) {
                        return back()->with('successful_message','Email updated successfully.');
                    }
                } else {
                   return back()->with('error_message', 'Use different email.');
                }
            }
        } catch (\Throwable $th) {
            return back()->with('error_message', $th->getMessage());
        }
    }

    public function update_password(Request $request)
    {
        try{
            $data = $request->except('_token');
            $user = User::where('id', $data['user_id'])->first();
            
            $this->validate($request, [
                'password' => ['required', 'string', 'min:6', 'confirmed'],
            ]);
            $user->password = Hash::make($data['password']);
            if ($user->save()) {
            return back()->with('successful_message','Password updated successfully.');
            }
        } catch (\Throwable $th) {
            return back()->with('error_message', $th->getMessage());
        }
    }
}
