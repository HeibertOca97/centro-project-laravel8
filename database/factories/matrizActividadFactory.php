<?php

namespace Database\Factories;

use App\Models\MatrizActividad;
use Illuminate\Database\Eloquent\Factories\Factory;

class matrizActividadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MatrizActividad::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      $activities = [$this->faker->text(25),$this->faker->text(25),$this->faker->text(25),$this->faker->text(25)];
      return [
          'fecha' => $this->faker->dateTimeBetween('-5 years'),
          'horario' => '13H30 - 18H30',
          'modalidad' => $this->faker->text(15),
          'actividades' => json_encode($activities),
          'observaciones' => $this->faker->text(15),
          'user_id' => rand(1,3),
      ];
    }
}
