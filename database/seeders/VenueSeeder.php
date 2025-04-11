<?php

namespace Database\Seeders;

use App\Models\Venue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $venues = [
            ['name' => 'Almacén Principal', 'description' => 'Almacén central'],
            ['name' => 'Estantería A', 'description' => 'Estantería para productos pequeños'],
            ['name' => 'Bodega B', 'description' => 'Bodega para artículos grandes'],
            ['name' => 'Vitrina', 'description' => 'Vitrina de exhibición'],
            ['name' => 'Reserva', 'description' => 'Área de reserva'],
        ];

        foreach ($venues as $venue) {
            Venue::create($venue);
        }
    }
}
