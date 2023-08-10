<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\feedback;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class profileController extends Controller
{
    public function settings()
    {
        $data = Auth()->User();

        return view('dashboard.profile.settings',compact('data'));
    }

    public function updateprofile(Request $request)
    {
        try{
            $user = Auth::user();
            $validateUser = $request->validate([
                'username' => ['required',Rule::unique('users')->ignore(Auth::user())],
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
                'email' => ['required', Rule::unique('users')->ignore(Auth::user())],
                'mobile' => ['required', 'min:10', 'max:10', Rule::unique('users')->ignore(Auth::user())],
                'recent_password' => 'required',
            ]);

            if (Hash::check($request->recent_password, $user->password)) {
                $user->update($validateUser);
                return back()->with('successful_message', 'Profile Upated Successfully'); 
            } else {
                return back()->with('error_message', 'Password is incorrect.');
            }  
        } catch (\Throwable $th) {
            return back()->with('error_message', $th->getMessage());
        }
    }

    public function updatepassword(Request $request)
    {
        try{
            $user = Auth::user();
            
            $validateUser = Validator::make($request->all(), 
            [
                'current_password' => 'required',
                'new_password' => ['required', 'min:6'],
                'confirm_password' => ['required', 'same:new_password']
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if (Hash::check($request->current_password, $user->password)) {

                $user->password = Hash::make($request->new_password);
                $user->save();

                if($user->save()) {
                    return back()->with('successful_message', 'Password updated successfully.');
                }
            } else {
                return back()->with('error_message', 'Old password is incorrect.');
            }
            
        } catch (\Throwable $th) {
            return back()->with('error_message', $th->getMessage());
        }
    }

    public function updatepicture(Request $request)
    {
        try{
                $user = Auth::user();
                $validateUser = Validator::make($request->all(),[
                    'profile_pic' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:4096',
                ]);

                if($validateUser->fails()){
                    return response()->json([
                        'status' => false,
                        'message' => 'validation error',
                        'errors' => $validateUser->errors()
                    ], 401);
                }

                $image = $request->file('profile_pic');
                $input['imagename'] = time().'.'.$image->extension();

                $destinationPath = public_path('profilepic');
                $image->move($destinationPath, $input['imagename']);

                $data = User::where('id', $user->id)
                            ->update([
                                'profile_pic'=> 'profilepic/'.$input['imagename'],
                            ]);
                return back()->with('successful_message','Profile Picture Updated Successfully');
        
        } catch (\Throwable $th) {
            return back()->with('error_message', $th->getMessage());
        }
    }

    public function appfeedback(Request $request)
    {
        $data = $request->except('_token');
        
        $data['user_id'] = Auth()->user()->id;

        $user = feedback::create($data);

        return back()->with('successfull_message', 'Feedback added successfully');
    }

}

