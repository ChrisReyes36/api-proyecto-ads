<?php

namespace Database\Seeders;

use App\Models\Alerta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeederAlertas extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alertas = [
            [
                'alert_date' => '2024-06-06',
                'alert_time' => '12:00',
                'description' => 'Alerta de prueba',
                'status' => 'no leída',
                'contrato_id' => 1
            ],
            [
                'alert_date' => '2024-06-06',
                'alert_time' => '12:00',
                'description' => 'Alerta de prueba',
                'status' => 'no leída',
                'contrato_id' => 2
            ],
            [
                'alert_date' => '2024-06-06',
                'alert_time' => '12:00',
                'description' => 'Alerta de prueba',
                'status' => 'no leída',
                'contrato_id' => 3
            ],
            [
                'alert_date' => '2024-06-06',
                'alert_time' => '12:00',
                'description' => 'Alerta de prueba',
                'status' => 'no leída',
                'contrato_id' => 4
            ],
            [
                'alert_date' => '2024-06-06',
                'alert_time' => '12:00',
                'description' => 'Alerta de prueba',
                'status' => 'no leída',
                'contrato_id' => 2
            ],
            [
                'alert_date' => '2024-06-06',
                'alert_time' => '12:00',
                'description' => 'Alerta de prueba',
                'status' => 'leída',
                'contrato_id' => 2
            ],
            [
                'alert_date' => '2024-06-06',
                'alert_time' => '12:00',
                'description' => 'Alerta de prueba',
                'status' => 'leída',
                'contrato_id' => 1
            ],
            [
                'alert_date' => '2024-06-06',
                'alert_time' => '12:00',
                'description' => 'Alerta de prueba',
                'status' => 'leída',
                'contrato_id' => 3
            ],
        ];

        foreach ($alertas as $alerta) {
            Alerta::create($alerta);
        }
    }
}
