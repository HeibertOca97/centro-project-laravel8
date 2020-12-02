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
          'name'=>'Admin',
          'username'=>'administrar',
          'email'=>'josephoca-1997@hotmail.com',
          'password'=>bcrypt('admin12345'),
        ]);

        $user1->assignRole('super admin');

    }
}
