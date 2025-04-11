<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Electrónicos', 'description' => 'Productos electrónicos y gadgets'],
            ['name' => 'Oficina', 'description' => 'Artículos de oficina'],
            ['name' => 'Muebles', 'description' => 'Muebles y accesorios'],
            ['name' => 'Herramientas', 'description' => 'Herramientas y equipos'],
            ['name' => 'Consumibles', 'description' => 'Productos consumibles'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
