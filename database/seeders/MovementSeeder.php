<?php

namespace Database\Seeders;

use App\Models\Movement;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // Asegúrate de tener al menos un usuario en el sistema
          $usuario = User::first();
        
          if (!$usuario) {
              // Crear un usuario si no existe ninguno
              $usuario = User::create([
                  'name' => 'Admin',
                  'email' => 'admin@example.com',
                  'password' => '123456789',
              ]);
          }
          
          $movements = [
              [
                  'product_id' => 1,
                  'user_id' => $usuario->id,
                  'type' => 'entrada',
                  'quantity' => 15,
                  'description' => 'Compra inicial',
                  'date' => now()
              ],
              [
                  'product_id' => 2,
                  'user_id' => $usuario->id,
                  'type' => 'entrada',
                  'quantity' => 5,
                  'description' => 'Compra inicial',
                  'date' => now()
              ],
              [
                  'product_id' => 3,
                  'user_id' => $usuario->id,
                  'type' => 'entrada',
                  'quantity' => 50,
                  'description' => 'Reposición de stock',
                  'date' => now()
              ],
              [
                  'product_id' => 1,
                  'user_id' => $usuario->id,
                  'type' => 'salida',
                  'quantity' => 2,
                  'description' => 'Venta',
                  'date' => now()
              ],
          ];
  
          foreach ($movements as $movement) {
              Movement::create($movement);
          }
    }
}
