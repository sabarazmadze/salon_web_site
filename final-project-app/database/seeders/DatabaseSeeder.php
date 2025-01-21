<?php

namespace Database\Seeders;

use App\Models\Bookings;
use App\Models\Clients;
use App\Models\Services;
use App\Models\StylistAvailability;
use App\Models\Stylists;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\StylistServices;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Stylists::factory(10)->create()->each(function ($stylist) {
            $stylist->availability()->saveMany(StylistAvailability::factory(3)->make());
            $stylist->services()->attach(Services::factory(5)->create());
        });

        Services::factory(20)->create();
        Clients::factory(50)->create();

        Bookings::factory(30)->create();
        StylistServices::factory(15)->create();
    }
}
