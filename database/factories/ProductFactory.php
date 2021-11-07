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
        return [
            'name' => $this->faker->unique()->firstName,
            'description' => $this->faker->paragraph(),
            'stock' => $this->faker->numberBetween(1, 255),
            'price' => $this->faker->numerify('###.##'),
            'photo' => 'https://picsum.photos/720/480',
        ];
    }
}
