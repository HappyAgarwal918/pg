<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\footer;
use App\Models\pages;
use App\Models\logo;
use App\Models\sponser;
use App\Models\blogs;
use App\Models\banner;
use Illuminate\Support\Facades\Validator;

class FrontendAdminController extends Controller
{
    public function headerfooter()
    {
        $pages = pages::get();
        $footer = footer::first();

        return view('admin.headerfooter',compact('pages','footer'));
    }

    public function primarymenu(Request $request)
    {
        $user = pages::where('id', $request->id)->first();
        if ($user['primary_menu'] == 1) {
            $data = pages::where('id', $request->id)->update(['primary_menu' => 0]);
        }else{
            $data = pages::where('id', $request->id)->update(['primary_menu' => 1]);
        }

        return response($data);
    }

    public function footermenu(Request $request)
    {
        $user = pages::where('id', $request->id)->first();
        if ($user['footer_links'] == 1) {
            $data = pages::where('id', $request->id)->update(['footer_links' => 0]);
        }else{
            $data = pages::where('id', $request->id)->update(['footer_links' => 1]);
        }

        return response($data);
    }

    public function footerabout(Request $request)
    {
        $data = footer::where('id', 1)->update(['about' => $request->about]);

        return back()->with('successful_message', 'About Updated Successfully');
    }

    public function footercontact(Request $request)
    {
        $data = footer::where('id', 1)
                ->update([
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                ]);

        return back()->with('successful_message', 'Contact Information Updated Successfully');
    }

    public function sociallinks(Request $request)
    {
        $data = footer::where('id', 1)
                ->update([
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'pinterest' => $request->pinterest,
                    'linkedin' => $request->linkedin,
                    'dribbble' => $request->dribbble,
                    'instagram' => $request->instagram,
                ]);

        return back()->with('successful_message', 'Social Links Updated Successfully');
    }

    public function logochange(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(), 
            [
                'logo' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            ]);

            if($validateUser->fails()){
                return back()->with('error_message', 'Validation Error');
            }

            $image = $request->file('logo');
            $input['imagename'] = time().'.'.$image->extension();

            $destinationPath = public_path('logo');
            $image->move($destinationPath, $input['imagename']);

            $data = logo::where('id', $request->id)
                    ->update([
                        'name' => $input['imagename'],
                        'path' => 'logo/'.$input['imagename'],
                    ]);

            return back()->with('successful_message', 'Logo Updated Successfully');

        } catch (\Throwable $th){

            return back()->with('error_message', $th->getMessage());
        }
    }

    public function banner(Request $request)
    {
        $data = banner::get();

        return view('admin.banner_img',compact('data'));
    }

    public function banneradd(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(), 
            [
                'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            ]);

            if($validateUser->fails()){
                return back()->with('error_message', 'Validation Error');
            }

            $image = $request->file('image');
            $input['imagename'] = time().'.'.$image->extension();

            $destinationPath = public_path('banner');
            $image->move($destinationPath, $input['imagename']);

            $data = banner::create([
                        'name' => $input['imagename'],
                        'img_src' => 'banner/'.$input['imagename'],
                    ]);

            return back()->with('successful_message', 'Banner Added Successfully');

        } catch (\Throwable $th){

            return back()->with('error_message', $th->getMessage());
        }
    }

    public function destroybanner($key)
    {
        $id = decrypt($key);
        $data = banner::findOrFail($id);
        $data->delete();

        return back()->with('successful_message', 'Banner Deleted Successfully.');
    }

    public function aboutusedit(Request $request)
    {
        $data['sponser'] = sponser::get();

        return view('admin.about_us_page',compact('data'));
    }

    public function sponser(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(), 
            [
                'name' => 'required',
                'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            ]);

            if($validateUser->fails()){
                return back()->with('error_message', 'Validation Error');
            }

            $image = $request->file('image');
            $input['imagename'] = time().'.'.$image->extension();

            $destinationPath = public_path('sponser');
            $image->move($destinationPath, $input['imagename']);

            $data = sponser::create([
                        'name' => $request->name,
                        'img' => $input['imagename'],
                        'path' => 'sponser/'.$input['imagename'],
                    ]);

            return back()->with('successful_message', 'Sponser Added Successfully');

        } catch (\Throwable $th){

            return back()->with('error_message', $th->getMessage());
        }
    }

    public function destroysponser($key)
    {
        $id = decrypt($key);
        $data = sponser::findOrFail($id);
        $data->delete();

        return back()->with('successful_message', 'Sponser Deleted Successfully.');
    }

    public function adminblogs()
    {        
        $data['blogs'] = blogs::get();

        return view('admin.blogs', compact('data'));
    }

    public function addblog()
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(), 
            [
                'name' => 'required',
                'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            ]);

            if($validateUser->fails()){
                return back()->with('error_message', 'Validation Error');
            }

            $image = $request->file('image');
            $input['imagename'] = time().'.'.$image->extension();

            $destinationPath = public_path('sponser');
            $image->move($destinationPath, $input['imagename']);

            if ($request->filled('contacts'))
            {
                $user -> contacts = implode(',', $request -> contacts);
            }
            $data = sponser::create([
                        'name' => $request->name,
                        'img' => $input['imagename'],
                        'path' => 'sponser/'.$input['imagename'],
                    ]);

            return back()->with('successful_message', 'Sponser Added Successfully');

        } catch (\Throwable $th){

            return back()->with('error_message', $th->getMessage());
        }

        return back()->with('successful_message', 'Blogs added Successfully');
    }

    public function destroyblog($key)
    {
        $id = decrypt($key);
        $data = blogs::findOrFail($id);
        $data->delete();

        return back()->with('successful_message', 'Blog Deleted Successfully.');
    }

    public function setting()
    {
        $data = Auth()->user();

        return view('admin.settings',compact('data'));
    }

}
