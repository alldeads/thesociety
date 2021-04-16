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
        $cost = rand(50, 200);
        $srp  = rand(500, 2000);

        $markup = (($srp - $cost) / $cost) * 100;

        return [     
            'avatar'            => $this->faker->imageUrl(600,480),
            'sku'               => $this->faker->isbn13,
            'name'              => $this->faker->sentence(2),
            'long_description'  => $this->faker->paragraph(1),
            'short_description' => $this->faker->sentence(4),
            'quantity'          => rand(50, 100),
            'threshold'         => rand(10, 20),
            'srp_price'         => $srp,
            'cost'              => $cost,
            'markup'            => $markup,
            'updated_by'        => 1,
            'created_by'        => 1
        ];
    }
}
