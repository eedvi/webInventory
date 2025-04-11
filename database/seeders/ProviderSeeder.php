<?php

namespace Database\Seeders;

use App\Models\Provider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $providers = [
            [
                'name' => 'TechSupply Inc.',
                'contact' => 'Juan Pérez',
                'email' => 'juan@techsupply.com',
                'phone' => '555-1234',
                'address' => 'Calle Principal 123'
            ],
            [
                'name' => 'Office Solutions',
                'contact' => 'María González',
                'email' => 'maria@officesolutions.com',
                'phone' => '555-5678',
                'address' => 'Av. Central 456'
            ],
            [
                'name' => 'Global Imports',
                'contact' => 'Carlos Rodríguez',
                'email' => 'carlos@globalimports.com',
                'phone' => '555-9012',
                'address' => 'Plaza Mayor 789'
            ],
        ];

        foreach ($providers as $provider) {
            Provider::create($provider);
        }
    }
}
