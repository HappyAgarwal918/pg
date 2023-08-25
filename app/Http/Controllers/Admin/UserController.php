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
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('type', '4')->get();

        return view('admin.users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            ]);

            $user->update($validateUser);
            return back()->with('successful_message', 'User Profile Upated Successfully');

        } catch (\Throwable $th) {
            return back()->with('error_message', $th->getMessage());
        }

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $uid = decrypt($id);

        $data = User::where('id', $uid)->first();

        return view('admin.users.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $uid = decrypt($id);

        $data = User::where('id', $uid)->first();

        return view('admin.users.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $uid = decrypt($id);
            $user = User::where('id', $uid)->first();
            $validateUser = $request->validate([
                'username' => ['required',Rule::unique('users')->ignore($user)],
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
                'email' => ['required', Rule::unique('users')->ignore($user)],
                'mobile' => ['required', 'min:10', 'max:10', Rule::unique('users')->ignore($user)],
                'recent_password' => 'required',
            ]);

            $user->update($validateUser);
            return back()->with('successful_message', 'User Profile Upated Successfully'); 
            
        } catch (\Throwable $th) {
            return back()->with('error_message', $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function password(Request $request, $id)
    {
        try{
            $user = decrypt($id);
            
            $validateUser = Validator::make($request->all(), 
            [
                'password' => ['required', 'min:6'],
                'confirm_password' => ['required', 'same:password']
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user->password = Hash::make($request->password);
            $user->save();

            if($user->save()) {
                return back()->with('successful_message', 'Password updated successfully.');
            }
            
        } catch (\Throwable $th) {
            return back()->with('error_message', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $uid = decrypt($id);

        $data = User::findOrFail($uid);
        $data->delete();

        return back()->with('successful_message', 'User Deleted Successfully.');
    }
}
