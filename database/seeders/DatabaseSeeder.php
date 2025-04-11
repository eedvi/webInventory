<?php

namespace Database\Seeders;

use App\Models\Movement;
use App\Models\Provider;
use App\Models\User;
use App\Models\Venue;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // CategorySeeder::class,
            // ProviderSeeder::class,
            // VenueSeeder::class,
            // ProductSeeder::class,
            MovementSeeder::class,
        ]);
    }
}
