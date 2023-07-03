<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
  
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'username'=>'Admin',
               'email'=>'admin@gmail.com',
               'mobile'=>'8797404608',
               'type'=>1,
               'password'=> bcrypt('123456'),
            ],
            [
               'username'=>'Broker User',
               'email'=>'broker@gmail.com',
               'mobile'=>'8797404609',
               'type'=> 2,
               'password'=> bcrypt('123456'),
            ],
            [
               'username'=>'Owner',
               'email'=>'owner@gmail.com',
               'mobile'=>'8797404610',
               'type'=>3,
               'password'=> bcrypt('123456'),
            ],
            [
               'username'=>'User',
               'email'=>'user@gmail.com',
               'mobile'=>'8797404611',
               'type'=>4,
               'password'=> bcrypt('123456'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}