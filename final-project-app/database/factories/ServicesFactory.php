<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\Services;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Services>
 */
class ServicesFactory extends Factory
{
    protected $model = Services::class;

    public function definition()
    {
        return [
            'service_name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'duration_minutes' => $this->faker->numberBetween(30, 120),
            'price' => $this->faker->randomFloat(2, 20, 200),
        ];
    }
}
