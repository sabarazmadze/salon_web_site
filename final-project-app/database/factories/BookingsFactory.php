<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Bookings;
use App\Models\Client;
use App\Models\Clients;
use App\Models\Stylist;
use App\Models\Stylists;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bookings>
 */
class BookingsFactory extends Factory
{
    protected $model = Bookings::class;

    public function definition()
    {
        return [
            'bookable_id' => Stylists::factory(),
            'bookable_type' => Stylists::class,
            'client_id' => Clients::factory(),
            'booking_date' => $this->faker->date,
            'booking_time' => $this->faker->time,
            'notes' => $this->faker->sentence,
        ];
    }
}
