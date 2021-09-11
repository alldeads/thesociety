<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cost = rand(50, 99);
        $srp  = rand(100, 1999);

        return [     
            'avatar'            => $this->faker->imageUrl(600,480),
            'sku'               => $this->faker->isbn13,
            'name'              => $this->faker->sentence(2),
            'long_description'  => $this->faker->paragraph(1),
            'short_description' => $this->faker->sentence(4),
            'threshold'         => rand(10, 20),
            'srp_price'         => $srp,
            'cost'              => $cost,
            'updated_by'        => 1,
            'created_by'        => 1
        ];
    }
}
