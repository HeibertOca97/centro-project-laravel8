<?php

namespace Database\Seeders;

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
          'username'=>'admin1',
          'email'=>'admin1@gmail.com',
          'password'=>bcrypt('admin12345'),
          'status'=>'1',
        ]);
        
        $user1->assignRole('super admin');
        
        $user2 = User::create([
          'username'=>'user1',
          'email'=>'user1@gmail.com',
          'password'=>bcrypt('user12345'),
          'status'=>'1',
        ]);
        
        $user2->assignRole('member');
        
    }
}
