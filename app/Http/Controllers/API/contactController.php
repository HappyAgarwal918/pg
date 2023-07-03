<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\contact;

class contactController extends Controller
{
    public function contact(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(), 
            [
                'name' => 'required',
                'email' => 'required|email',
                'subject' => 'required',
                'phone_number' => 'required',
                'message' => 'required',
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $data = contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'phone_number' => $request->phone_number,
                'message' => $request->message,
            ]);

            
            return response()->json([
                'status' => true,
                'message' => 'Our team will reach you soon',
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
