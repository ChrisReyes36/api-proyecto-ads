<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mantenimiento;
use App\Traits\JsonResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MantenimientoController extends Controller
{
    use JsonResponseTrait;

    public function index()
    {
        $mantenimientos = Mantenimiento::with('contrato', 'ordenesTrabajo')->get();

        return $this->jsonResponse($mantenimientos, 200, []);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'scheduled_date' => 'required|date',
            'observations' => 'string',
            'contrato_id' => 'required|integer|exists:contratos,id'
        ]);

        if ($validate->fails()) {
            return $this->jsonResponse([], 422, $validate->errors());
        }

        Mantenimiento::create([
            'scheduled_date' => $request->scheduled_date,
            'status' => 'pendiente',
            'observations' => $request->observations ?? '',
            'contrato_id' => $request->contrato_id
        ]);

        return $this->jsonResponse([
            'message' => 'El mantenimiento se creó correctamente'
        ], 200, []);
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'scheduled_date' => 'required|date',
            'date_made' => 'date',
            'status' => 'required|string|in:pendiente,realizado',
            'observations' => 'string',
            'contrato_id' => 'required|integer|exists:contratos,id'
        ]);

        if ($validate->fails()) {
            return $this->jsonResponse([], 422, $validate->errors());
        }

        $mantenimiento = Mantenimiento::find($id);

        $mantenimiento->update([
            'scheduled_date' => $request->scheduled_date,
            'date_made' => $request->date_made,
            'status' => $request->status,
            'observations' => $request->observations,
            'contrato_id' => $request->contrato_id
        ]);

        return $this->jsonResponse([
            'message' => 'El mantenimiento se actualizó correctamente'
        ], 200, []);
    }

    public function destroy($id)
    {
        $mantenimiento = Mantenimiento::find($id);

        $mantenimiento->delete();

        return $this->jsonResponse([
            'message' => 'El mantenimiento se eliminó correctamente'
        ], 200, []);
    }
}
