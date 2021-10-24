<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\User;
use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $rdmNum = $this->faker->numberBetween(1, 100)%2;
        
        return [
            'ext_number' => $this->faker->buildingNumber,
            'street' => $this->faker->streetName,
            'latitude' => $this->faker->latitude, 
            'longitude' => $this->faker->longitude,
            
            'addressable_id' => ($rdmNum === 0)
                                ? random_int(1, User::count()) 
                                : random_int(1, Provider::count()),
            
            'addressable_type' => ($rdmNum === 0)
                                ? 'App\\Models\\User' 
                                : 'App\\Models\\Provider',
        ];
    }
}
