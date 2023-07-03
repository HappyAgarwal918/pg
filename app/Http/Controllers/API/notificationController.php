<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\notification;
use Carbon\Carbon;
use DB;

class notificationController extends Controller
{
    public function shownotification($lat, $lon)
    {
        try {
            $from = Carbon::now()->subDays(7)->toDateTimeString();

            $data = notification::join('users', 'users.id', 'notification.user_id')
                    ->where('notification.updated_at', '>=', $from)
                    ->select(
                        'notification.title',
                        'notification.body',
                        'users.brand_name',
                        'users.brand_image_path',
                        'users.city',
                        'notification.updated_at as notification_time',
                        DB::raw("6371 * acos(cos(radians(" . $lat . ")) 
                        * cos(radians(users.latitude)) 
                        * cos(radians(users.longitude) - radians(" . $lon . ")) 
                        + sin(radians(" .$lat. ")) 
                        * sin(radians(users.latitude))) AS distance"))
                    ->having('distance','<=','15')
                    ->get();

            return response( )->json([
                'status' => true,
                'message' => 'notifications',
                'data' => $data,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
