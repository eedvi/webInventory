<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Laptop HP Pavilion',
                'description' => 'Laptop HP Pavilion 15.6", Core i5, 8GB RAM',
                'price' => 899.99,
                'current_stock' => 15,
                'minimum_stock' => 5,
                'sku_code' => 'LP-HP-001',
                'category_id' => 1,
                'venue_id' => 1,
                'providers' => [1]
            ],
            [
                'name' => 'Escritorio Ejecutivo',
                'description' => 'Escritorio ejecutivo de madera',
                'price' => 349.99,
                'current_stock' => 5,
                'minimum_stock' => 2,
                'sku_code' => 'MUE-ESC-001',
                'category_id' => 3,
                'venue_id' => 3,
                'providers' => [3]
            ],
            [
                'name' => 'Set de Bolígrafos',
                'description' => 'Set de 12 bolígrafos de colores',
                'price' => 12.99,
                'current_stock' => 50,
                'minimum_stock' => 20,
                'sku_code' => 'OF-BOL-001',
                'category_id' => 2,
                'venue_id' => 2,
                'providers' => [2]
            ],
            [
                'name' => 'Taladro Inalámbrico',
                'description' => 'Taladro inalámbrico 18V',
                'price' => 129.99,
                'current_stock' => 8,
                'minimum_stock' => 3,
                'sku_code' => 'HER-TAL-001',
                'category_id' => 4,
                'venue_id' => 1,
                'providers' => [3]
            ],
            [
                'name' => 'Papel A4 (Resma)',
                'description' => 'Resma de papel A4, 500 hojas',
                'price' => 8.99,
                'current_stock' => 100,
                'minimum_stock' => 30,
                'sku_code' => 'CON-PAP-001',
                'category_id' => 5,
                'venue_id' => 5,
                'providers' => [2]
            ],
        ];

        foreach ($products as $product) {
            $providersIds = $product['providers'];
            unset($product['providers']);
            
            $newProduct = Product::create($product);
            
            // Asociar providers
            $newProduct->providers()->attach($providersIds);
        }
    }
}
