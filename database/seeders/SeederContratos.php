<?php

namespace Database\Seeders;

use App\Models\Contrato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeederContratos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contratos = [
            [
                'maintenance_plan' => 'Contrato 1',
                'start_date' => '2024-06-06',
                'end_date' => '2024-06-06',
                'cliente_id' => 1,
                'filtro_id' => 1
            ],
            [
                'maintenance_plan' => 'Contrato 2',
                'start_date' => '2024-06-06',
                'end_date' => '2024-06-06',
                'cliente_id' => 2,
                'filtro_id' => 2
            ],
            [
                'maintenance_plan' => 'Contrato 3',
                'start_date' => '2024-06-06',
                'end_date' => '2024-06-06',
                'cliente_id' => 3,
                'filtro_id' => 3
            ],
            [
                'maintenance_plan' => 'Contrato 4',
                'start_date' => '2024-06-06',
                'end_date' => '2024-06-06',
                'cliente_id' => 4,
                'filtro_id' => 4
            ],
            [
                'maintenance_plan' => 'Contrato 5',
                'start_date' => '2024-06-06',
                'end_date' => '2024-06-06',
                'cliente_id' => 1,
                'filtro_id' => 2
            ],
            [
                'maintenance_plan' => 'Contrato 6',
                'start_date' => '2024-06-06',
                'end_date' => '2024-06-06',
                'cliente_id' => 2,
                'filtro_id' => 3
            ],
            [
                'maintenance_plan' => 'Contrato 7',
                'start_date' => '2024-06-06',
                'end_date' => '2024-06-06',
                'cliente_id' => 3,
                'filtro_id' => 4
            ],
            [
                'maintenance_plan' => 'Contrato 8',
                'start_date' => '2024-06-06',
                'end_date' => '2024-06-06',
                'cliente_id' => 4,
                'filtro_id' => 1
            ]
        ];

        foreach ($contratos as $contrato) {
            Contrato::create($contrato);
        }
    }
}
