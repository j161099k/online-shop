<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'total' => 0,
            'details' => $this->faker->paragraph(1),
            // 'user_id' => $this->faker->numberBetween(1, User::count()),
            // 'address_id' => $this->faker->numberBetween(1, User::with('addresses')->count()),
        ];
    }
}
