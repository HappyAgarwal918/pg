<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\properties;
use App\Mail\DemoMail;
use App\Models\propertyImg;
use App\Models\tenants;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ownerPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = properties::where('user_id', Auth()->user()->id)->with([
            'propertyimg' => function ($query) {
                $query->where('excerpt', '1');
             }
        ])->get();

        return view('dashboard.owner.property.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tenants = tenants::get();

        return view('dashboard.owner.property.create', compact('tenants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['sb_room_count'] = NULL;
        $data['sb_bathroom_count'] = NULL;
        $data['sb_room_size'] = NULL;
        $data['sb_category'] = NULL;
        $data['sb_furnished_type'] = NULL;
        $data['sb_price'] = NULL;
        $data['db_room_count'] = NULL;
        $data['db_bathroom_count'] = NULL;
        $data['db_room_size'] = NULL;
        $data['db_category'] = NULL;
        $data['db_furnished_type'] = NULL;
        $data['db_price'] = NULL;
        $data['tb_room_count'] = NULL;
        $data['tb_bathroom_count'] = NULL;
        $data['tb_room_size'] = NULL;
        $data['tb_category'] = NULL;
        $data['tb_furnished_type'] = NULL;
        $data['tb_price'] = NULL;
        $data['fb_room_count'] = NULL;
        $data['fb_bathroom_count'] = NULL;
        $data['fb_room_size'] = NULL;
        $data['fb_category'] = NULL;
        $data['fb_furnished_type'] = NULL;
        $data['fb_price'] = NULL;
        $data['meal_type'] = NULL;
        $data['parking'] = NULL;

        $data = $request->except(['_token']);
        $data['pid'] = random_int(1000, 9999);

        if ($request->filled(['room_type'])) 
        {
            $data['room_type'] = implode(', ', $data['room_type']);
        }

        if ($request->filled(['amenities'])) 
        {
            $data['amenities'] = implode(', ', $data['amenities']);
        }

        $data['user_id'] = Auth()->user()->id;

        $user = properties::create($data);

        if($user){

            if($request->file('excerpt_img')){
                $excerpt_img = $request->file('excerpt_img');
                $input['imagename'] = time().'.'.$excerpt_img->extension();

                $destinationPath = public_path('property_img');
                $excerpt_img->move($destinationPath, $input['imagename']);

                $imgdata = propertyImg::create([
                    'name'=> $input['imagename'],
                    'img_src'=> 'property_img/'.$input['imagename'],
                    'excerpt'=> '1',
                    'property_id'=> $user['id'],
                ]);
            }

            $upload = [];
            if (is_array($request->file('upload')) || is_object($request->file('upload'))){
                foreach ($request->file('upload') as $propertyimg) {
                    $input['images'] = time().rand(1,99).'.'.$propertyimg->extension();
                    $propertyimg->move($destinationPath, $input['images']);

                    $upload[]['name'] = $input['images'];

                    $img = propertyImg::create([
                        'name'=> $input['images'],
                        'img_src'=> 'property_img/'.$input['images'],
                        'property_id'=> $user['id'],
                    ]);
                }
            }                 
        }

        if($user){

            $pid = $user['pid'];
            $email = Auth()->user()->email;
            $address = $user['full_address'];
            $roomTypes = $user['room_type'];

            // Render the external Blade template and get its HTML content
            $emailContent = View::make('email.email_template', compact('pid', 'email', 'address', 'roomTypes'))->render();

            $mail = new PHPMailer(true);
   
            /* Email SMTP Settings */
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->SMTPSecure = env('MAIL_ENCRYPTION');
            $mail->Port = env('MAIL_PORT');

            $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $mail->addCC('happyagarwal918@gmail.com', 'Happy Agarwal');
            $mail->addAddress(Auth()->user()->email);
   
            $mail->isHTML(true);
   
            $mail->Subject = "Happi To Help Property Add";
            $mail->Body = $emailContent; // Set the email body from the Blade template

            if( !$mail->send() ) {
                return redirect()->route('owner.property.index')->with('successful_message', 'Property created successfully & Email not sent.');
            }
              
            else {
                return redirect()->route('owner.property.index')->with('successful_message', 'Property created successfully & Email has been sent.');
            }

            // $mailData = [
            //     'PID' => $user['pid'],
            //     'message' => 'Your Property added successfully.'
            // ];

            // Mail::to(Auth()->user()->email)->cc('happyagarwal918@gmail.com')->send(new DemoMail($mailData));
        }
        
        return redirect()->route('owner.property.index')->with('successful_message', 'Property created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pid = decrypt($id);

        $property = properties::where('id', $pid)->with([
            'propertyimg' => function ($query) {
                $query->where('excerpt', '1');
             }
        ])->first();
        $property['room_type'] = explode(', ', $property->room_type);
        $property['amenities'] = explode(', ', $property->amenities);
        $property['image'] = propertyImg::where('property_id', $pid)->where('excerpt', 0)->get();

        return view('dashboard.owner.property.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pid = decrypt($id);
        $data = properties::where('id', $pid)->with([
            'propertyimg' => function ($query) {
                $query->where('excerpt', '1');
             }
        ])->first();
        $data['room_type'] = explode(', ', $data->room_type);
        $data['amenities'] = explode(', ', $data->amenities);
        $data['image'] = propertyImg::where('property_id', $pid)->where('excerpt', 0)->get();

        return view('dashboard.owner.property.edit', compact('data'));
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
        $data['sb_room_count'] = NULL;
        $data['sb_bathroom_count'] = NULL;
        $data['sb_room_size'] = NULL;
        $data['sb_category'] = NULL;
        $data['sb_furnished_type'] = NULL;
        $data['sb_price'] = NULL;
        $data['db_room_count'] = NULL;
        $data['db_bathroom_count'] = NULL;
        $data['db_room_size'] = NULL;
        $data['db_category'] = NULL;
        $data['db_furnished_type'] = NULL;
        $data['db_price'] = NULL;
        $data['tb_room_count'] = NULL;
        $data['tb_bathroom_count'] = NULL;
        $data['tb_room_size'] = NULL;
        $data['tb_category'] = NULL;
        $data['tb_furnished_type'] = NULL;
        $data['tb_price'] = NULL;
        $data['fb_room_count'] = NULL;
        $data['fb_bathroom_count'] = NULL;
        $data['fb_room_size'] = NULL;
        $data['fb_category'] = NULL;
        $data['fb_furnished_type'] = NULL;
        $data['fb_price'] = NULL;
        $data['meal_type'] = NULL;
        $data['parking'] = NULL;

        $pid = decrypt($id);

        $property = properties::where('id', $pid);

        $data = $request->except(['_token', '_method','excerpt_img','submit']);

        if ($request->filled(['room_type'])) 
        {
            $data['room_type'] = implode(', ', $data['room_type']);
        }

        if ($request->filled(['amenities'])) 
        {
            $data['amenities'] = implode(', ', $data['amenities']);
        }

        $data['user_id'] = Auth()->user()->id;


        $property->update($data);

        if($request->file('excerpt_img')){
            $excerpt_img = $request->file('excerpt_img');
            $input['imagename'] = time().'.'.$excerpt_img->extension();

            $destinationPath = public_path('property_img');
            $excerpt_img->move($destinationPath, $input['imagename']);

            $exp_img = propertyImg::where('property_id', $pid)
                ->where('excerpt', '1')->first(); 

            if($exp_img){
                $imgdata = propertyImg::where('property_id', $pid)
                ->where('excerpt', '1')
                ->update([
                    'name'=> $input['imagename'],
                    'img_src'=> 'property_img/'.$input['imagename'],
                ]);
            }else{
                $imgdata = propertyImg::create([
                    'name'=> $input['imagename'],
                    'img_src'=> 'property_img/'.$input['imagename'],
                    'excerpt'=> '1',
                    'property_id'=> $pid,
                ]);
            }
        }

        return redirect()->route('owner.property.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // echo "hello";die;
        $pid = decrypt($id);
        $pg = properties::findorfail($pid);
    
        $pg->delete();

        return back();
    }
}
