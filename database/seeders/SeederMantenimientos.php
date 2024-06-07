<?php

namespace Database\Seeders;

use App\Models\Mantenimiento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeederMantenimientos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mantenimientos = [
            [
                'scheduled_date' => '2024-06-06',
                'date_made' => '2024-06-06',
                'status' => 'realizado',
                'observations' => 'Observaciones 1',
                'contrato_id' => 1
            ],
            [
                'scheduled_date' => '2024-06-06',
                'date_made' => '2024-06-06',
                'status' => 'realizado',
                'observations' => 'Observaciones 2',
                'contrato_id' => 2
            ],
            [
                'scheduled_date' => '2024-06-06',
                'date_made' => '2024-06-06',
                'status' => 'realizado',
                'observations' => 'Observaciones 3',
                'contrato_id' => 3
            ],
            [
                'scheduled_date' => '2024-06-06',
                'date_made' => '2024-06-06',
                'status' => 'realizado',
                'observations' => 'Observaciones 4',
                'contrato_id' => 4
            ],
            [
                'scheduled_date' => '2024-06-06',
                'date_made' => '2024-06-06',
                'status' => 'realizado',
                'observations' => 'Observaciones 5',
                'contrato_id' => 1
            ],
            [
                'scheduled_date' => '2024-06-06',
                'date_made' => null,
                'status' => 'pendiente',
                'observations' => 'Observaciones 6',
                'contrato_id' => 1
            ],
            [
                'scheduled_date' => '2024-06-06',
                'date_made' => null,
                'status' => 'pendiente',
                'observations' => 'Observaciones 7',
                'contrato_id' => 2
            ],
        ];

        foreach ($mantenimientos as $mantenimiento) {
            Mantenimiento::create($mantenimiento);
        }
    }
}
