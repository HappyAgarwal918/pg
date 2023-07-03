<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\notification;

class CreatenotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notifications = [
            [
               'name'=>'test',
               'description'=>'test',
            ],
        ];
    
        foreach ($notifications as $key => $notification) {
            notification::create($notification);
        }
    }
}
