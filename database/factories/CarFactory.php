<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class CarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'user_id' =>  User::factory(),
            'license_number' => $this->faker->creditCardNumber(),
            'vin' => $this->faker->ean13(),
            'year' => $this->faker->year(),
            'model' => $this->faker->word(),
            'manufacturer' => $this->faker->word(),

        ];
    }
}
