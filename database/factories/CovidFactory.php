<?php

namespace Database\Factories;

use App\Models\Covid;
use Illuminate\Database\Eloquent\Factories\Factory;

class CovidFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Covid::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name'   => $this->faker->firstName,
            'last_name'    => $this->faker->lastName,
            'phone'        => $this->faker->phoneNumber,
            'address'      => $this->faker->address,
            'date_visited' => $this->faker->date,
            'created_by'   => 1,
            'updated_by'   => 1
        ];
    }
}
