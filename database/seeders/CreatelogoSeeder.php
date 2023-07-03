<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\logo;

class CreatelogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $logos = [
            [
               'name'=>'logo',
               'path'=>'logo/logo.png',
            ],
            [
               'name'=>'logo small',
               'path'=>'logo/logo-small.png',
            ],
            [
               'name'=>'logo ct',
               'path'=>'logo/logo-ct.png',
            ],
        ];
    
        foreach ($logos as $key => $logo) {
            logo::create($logo);
        }
    }
}
