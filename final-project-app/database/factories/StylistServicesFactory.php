<?php

namespace Database\Factories;

use App\Models\Services;
use App\Models\Stylists;
use App\Models\StylistServices;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stylist_services>
 */
class StylistServicesFactory extends Factory
{
    protected $model = StylistServices::class;

    public function definition()
    {
        return [
            'stylist_id' => Stylists::factory(),
            'serviceable_id' => Services::factory(),
            'serviceable_type' => Services::class,
        ];
    }
}
