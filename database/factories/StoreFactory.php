<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Store::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'     => $this->faker->name(),
            'age'      => $this->faker->numberBetween(15, 40),
            // unique() must be called BEFORE the generator method
            'email'    => $this->faker->unique()->safeEmail(),
            'address'  => $this->faker->address(),
            'phone'    => $this->faker->phoneNumber(),
            'city'     => $this->faker->city(),
            // hash passwords for real use; using bcrypt here for simplicity
            'password' => bcrypt('password'), // or use \Illuminate\Support\Facades\Hash::make('password')
        ];
    }
}
