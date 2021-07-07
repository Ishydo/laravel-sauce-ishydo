<?php

namespace Database\Factories;

use App\Models\Stuff;
use Illuminate\Database\Eloquent\Factories\Factory;

class StuffFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Stuff::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(20),
            'description' => $this->faker->text(50),
        ];
    }
}
