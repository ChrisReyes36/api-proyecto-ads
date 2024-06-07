<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Contrato;
use App\Models\Filtro;
use App\Models\InventarioPieza;
use App\Models\Mantenimiento;
use App\Traits\JsonResponseTrait;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    use JsonResponseTrait;

    public function contadores()
    {
        $contratos = Contrato::count();
        $clientes = Cliente::count();
        $inventarioPiezas = InventarioPieza::count();
        $filtros = Filtro::count();

        $data = [
            'contratos' => $contratos,
            'clientes' => $clientes,
            'inventarioPiezas' => $inventarioPiezas,
            'filtros' => $filtros,
        ];

        return $this->jsonResponse($data, 200, []);
    }

    public function graficoContratos()
    {
        $contratos = Contrato::count();
        $mantenimientosPendientes = Mantenimiento::where('status', 'pendiente')->count();
        $mantenimientosRealizados = Mantenimiento::where('status', 'realizado')->count();

        $data = [
            [
                'label' => 'Contratos',
                'value' => $contratos,
            ],
            [
                'label' => 'Mantenimientos Pendientes',
                'value' => $mantenimientosPendientes,
            ],
            [
                'label' => 'Mantenimientos Realizados',
                'value' => $mantenimientosRealizados,
            ]
        ];

        return $this->jsonResponse($data, 200, []);
    }

    public function ultimosMantenimientos()
    {
        $mantenimientos = Mantenimiento::with('contrato')->orderBy('created_at', 'desc')->limit(5)->get();

        return $this->jsonResponse($mantenimientos, 200, []);
    }
}
