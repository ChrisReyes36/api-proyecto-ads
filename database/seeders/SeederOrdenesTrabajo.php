<?php

namespace Database\Seeders;

use App\Models\InventarioPieza;
use App\Models\OrdenTrabajo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeederOrdenesTrabajo extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ordenes = [
            [
                'quantity_used' => 5,
                'date' => '2024-06-06',
                'observations' => 'Orden de prueba',
                'mantenimiento_id' => 1,
                'inventario_pieza_id' => 1
            ],
            [
                'quantity_used' => 10,
                'date' => '2024-06-06',
                'observations' => 'Orden de prueba',
                'mantenimiento_id' => 2,
                'inventario_pieza_id' => 2
            ],
            [
                'quantity_used' => 15,
                'date' => '2024-06-06',
                'observations' => 'Orden de prueba',
                'mantenimiento_id' => 3,
                'inventario_pieza_id' => 3
            ],
            [
                'quantity_used' => 20,
                'date' => '2024-06-06',
                'observations' => 'Orden de prueba',
                'mantenimiento_id' => 4,
                'inventario_pieza_id' => 4
            ],
            [
                'quantity_used' => 25,
                'date' => '2024-06-06',
                'observations' => 'Orden de prueba',
                'mantenimiento_id' => 5,
                'inventario_pieza_id' => 5
            ],
            [
                'quantity_used' => 30,
                'date' => '2024-06-06',
                'observations' => 'Orden de prueba',
                'mantenimiento_id' => 6,
                'inventario_pieza_id' => 6
            ],
            [
                'quantity_used' => 35,
                'date' => '2024-06-06',
                'observations' => 'Orden de prueba',
                'mantenimiento_id' => 7,
                'inventario_pieza_id' => 7
            ],
        ];

        foreach ($ordenes as $orden) {
            OrdenTrabajo::create($orden);
            $pieza = InventarioPieza::find($orden['inventario_pieza_id']);
            $pieza->quantity -= $orden['quantity_used'];
            $pieza->save();
        }
    }
}
