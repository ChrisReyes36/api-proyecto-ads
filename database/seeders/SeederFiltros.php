<?php

namespace Database\Seeders;

use App\Models\Filtro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeederFiltros extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filtros = [
            [
                'model' => 'Modelo 1',
                'brand' => 'Marca 1',
                'description' => 'Descripcion 1',
                'acquisition_date' => '2024-06-06'
            ],
            [
                'model' => 'Modelo 2',
                'brand' => 'Marca 2',
                'description' => 'Descripcion 2',
                'acquisition_date' => '2024-06-06'
            ],
            [
                'model' => 'Modelo 3',
                'brand' => 'Marca 3',
                'description' => 'Descripcion 3',
                'acquisition_date' => '2024-06-06'
            ],
            [
                'model' => 'Modelo 4',
                'brand' => 'Marca 4',
                'description' => 'Descripcion 4',
                'acquisition_date' => '2024-06-06'
            ],
        ];

        foreach ($filtros as $filtro) {
            Filtro::create($filtro);
        }
    }
}
