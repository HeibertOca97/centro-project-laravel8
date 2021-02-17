<?php

namespace Database\Factories;

use App\Models\Emprendedor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmprendedoresFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Emprendedor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      $name = $this->faker->name();
      $lastName = $this->faker->lastName();
      $name = "{$name} {$lastName}";
        return [
          'cedula'  =>  $this->faker->randomNumber(1,10),
          'nombres' => $name,
          'apellidos' =>  $lastName,
          'email' =>  $this->faker->email(),
          'fec_nac' =>  $this->faker->date(),
          'telefono'  =>  $this->faker->phoneNumber,
          'celular' =>  $this->faker->phoneNumber,
          'red_wa' => rand(1,2),
          'slug'  =>  Str::slug($name),  
          'emprendedor_id' => rand(1,25),  
        ];
    }
}
