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
          'cedula'=>'0956993984',
          'nombres'=>'HEIBERT JOSEPH',
          'apellidos'=>'OCAÑA RODRIGUEZ',
          'cargo'=>'ADMINISTRADOR DEL SISTEMA',
          'slug'=>'admin1'
        ]);
        
        $user1->assignRole('super admin');
        
        $user2 = User::create([
          'username'=>'user1',
          'email'=>'user1@gmail.com',
          'password'=>bcrypt('123456789'),
          'status'=>'1',
          'cedula'=>'1234567801',
          'nombres'=>'USUARIO UNO',
          'apellidos'=>'USER ONE',
          'cargo'=>'USUARIO I',
          'slug'=>'user1'
        ]);
        
        $user2->assignRole('member');
        
        $user3 = User::create([
          'username'=>'user2',
          'email'=>'user2@gmail.com',
          'password'=>bcrypt('123456789'),
          'status'=>'1',
          'cedula'=>'1234567802',
          'nombres'=>'USUARIO DOS',
          'apellidos'=>'USER TWO',
          'cargo'=>'USUARIO II',
          'slug'=>'user2'
        ]);
        
        $user3->assignRole('member');
        
    }
}
