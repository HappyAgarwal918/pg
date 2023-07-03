<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Models\banner;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    public function showbanner()
    {
        try {

            $data = banner::select('banner_image_name', 'banner_image_path')->get();

            return response()->json([
                'status' => true,
                'message' => 'Banners',
                'data' => $data,
                // 'token' => $data->createToken("API TOKEN")->plainTextToken,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
