<?php

namespace Database\Factories;

use App\Models\PlanTrabajo;
use Illuminate\Database\Eloquent\Factories\Factory;

class planTrabajoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PlanTrabajo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'evento' => $this->faker->text(255),
            'lugar' => $this->faker->text(50),
            'responsables' => $this->faker->text(10),
            'fecha' => $this->faker->dateTimeBetween('-5 years'),
            'hora' => '13H00 - 16H00',
            'user_id' => rand(1,3),
        ];
    }
}
