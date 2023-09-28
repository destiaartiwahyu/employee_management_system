<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\Division;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class DivisionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Division::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
   
}
