<?php

namespace Database\Factories;

use App\Models\Stylists;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stylists>
 */
class StylistsFactory extends Factory
{
    protected $model = Stylists::class;

    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'phone_number' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'experience_years' => $this->faker->numberBetween(1, 20),
            'specialty' => $this->faker->word,
        ];
    }
}
