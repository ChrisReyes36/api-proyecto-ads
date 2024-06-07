<?php

namespace Database\Seeders;

use App\Models\InventarioPieza;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeederInventarioPiezas extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $piezas = [
            [
                'name' => 'Pieza 1',
                'description' => 'Pieza de prueba',
                'quantity' => 10,
                'location' => 'Bodega 1'
            ],
            [
                'name' => 'Pieza 2',
                'description' => 'Pieza de prueba',
                'quantity' => 20,
                'location' => 'Bodega 2'
            ],
            [
                'name' => 'Pieza 3',
                'description' => 'Pieza de prueba',
                'quantity' => 30,
                'location' => 'Bodega 3'
            ],
            [
                'name' => 'Pieza 4',
                'description' => 'Pieza de prueba',
                'quantity' => 40,
                'location' => 'Bodega 4'
            ],
            [
                'name' => 'Pieza 5',
                'description' => 'Pieza de prueba',
                'quantity' => 50,
                'location' => 'Bodega 5'
            ],
            [
                'name' => 'Pieza 6',
                'description' => 'Pieza de prueba',
                'quantity' => 60,
                'location' => 'Bodega 6'
            ],
            [
                'name' => 'Pieza 7',
                'description' => 'Pieza de prueba',
                'quantity' => 70,
                'location' => 'Bodega 7'
            ],
            [
                'name' => 'Pieza 8',
                'description' => 'Pieza de prueba',
                'quantity' => 80,
                'location' => 'Bodega 8'
            ],
            [
                'name' => 'Pieza 9',
                'description' => 'Pieza de prueba',
                'quantity' => 90,
                'location' => 'Bodega 9'
            ],
            [
                'name' => 'Pieza 10',
                'description' => 'Pieza de prueba',
                'quantity' => 100,
                'location' => 'Bodega 10'
            ],
        ];

        foreach ($piezas as $pieza) {
            InventarioPieza::create($pieza);
        }
    }
}
