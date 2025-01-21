<?php

namespace Database\Factories;

use App\Models\StylistAvailability;
use App\Models\Stylists;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stylist_availability>
 */
class StylistAvailabilityFactory extends Factory
{
    protected $model = StylistAvailability::class;

    public function definition()
    {
        return [
            'stylist_id' => Stylists::factory(),
            'available_date' => $this->faker->date,
            'available_start_time' => $this->faker->time,
            'available_end_time' => $this->faker->time,
        ];
    }
}
