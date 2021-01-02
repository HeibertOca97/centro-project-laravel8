<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(\Database\Seeders\PermissionSeeder::class);
      $this->call(\Database\Seeders\UserSeeder::class);
        
      \App\Models\PlanTrabajo::factory(200)->create();
      \App\Models\MatrizActividad::factory(150)->create();

    }
}
