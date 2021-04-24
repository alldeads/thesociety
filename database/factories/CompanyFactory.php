<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'           => $this->faker->company,
            'email'          => $this->faker->email,
            'phone'          => $this->faker->phoneNumber,
            'fax'            => $this->faker->tollFreePhoneNumber,
            'state'          => $this->faker->state,
            'city'           => $this->faker->city,
            'country'        => $this->faker->country,
            'address_line_1' => $this->faker->streetAddress,
            'postal'         => $this->faker->postcode,
            'address_line_2' => $this->faker->secondaryAddress,
            'status'         => 'active',
            'avatar'         => 'https://loremflickr.com/600/400?random=" . rand(0, 999)',
        ];
    }
}
