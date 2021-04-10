<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name'     => $this->faker->firstName,
            'last_name'      => $this->faker->lastName,
            'middle_name'    => $this->faker->lastName,
            'birth_date'     => $this->faker->date,
            'phone_number'   => $this->faker->e164PhoneNumber,
            'marital_status' => $this->faker->randomElement($array = array ('single','widowed','married')),
            'address_line_1' => $this->faker->address,
            'address_line_2' => $this->faker->secondaryAddress,
            'city'           => $this->faker->city,
            'state'          => $this->faker->state,
            'postal'         => $this->faker->postcode,
            'country'        => $this->faker->country,
            'sss'            => $this->faker->ean13,
            'pagibig'        => $this->faker->ean13,
            'philhealth'     => $this->faker->ean13,
            'tin'            => $this->faker->ean13,
        ];
    }
}
