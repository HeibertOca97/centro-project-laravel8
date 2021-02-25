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
      $this->call(\Database\Seeders\FormRegisterEmprendedorSeeder::class);
      // \App\Models\MatrizActividad::factory(25)->create();
      // \App\Models\PlanTrabajo::factory(25)->create();

    }
}
