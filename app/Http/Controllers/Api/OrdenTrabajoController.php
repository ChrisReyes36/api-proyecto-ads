<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrdenTrabajo;
use App\Traits\JsonResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrdenTrabajoController extends Controller
{
    use JsonResponseTrait;

    public function index()
    {
        $ordenesTrabajo = OrdenTrabajo::with('mantenimiento', 'inventarioPieza')->get();

        return $this->jsonResponse($ordenesTrabajo, 200, []);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'quantity_used' => 'required|integer',
            'observations' => 'string',
            'mantenimiento_id' => 'required|integer|exists:mantenimientos,id',
            'inventario_pieza_id' => 'required|integer|exists:inventario_piezas,id'
        ]);

        if ($validate->fails()) {
            return $this->jsonResponse([], 422, $validate->errors());
        }

        OrdenTrabajo::create([
            'quantity_used' => $request->quantity_used,
            'observations' => $request->observations ?? '',
            'mantenimiento_id' => $request->mantenimiento_id,
            'inventario_pieza_id' => $request->inventario_pieza_id
        ]);

        return $this->jsonResponse([
            'message' => 'La orden de trabajo se creó correctamente'
        ], 200, []);
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'quantity_used' => 'required|integer',
            'observations' => 'string',
            'date' => 'required|date',
            'mantenimiento_id' => 'required|integer|exists:mantenimientos,id',
            'inventario_pieza_id' => 'required|integer|exists:inventario_piezas,id'
        ]);

        if ($validate->fails()) {
            return $this->jsonResponse([], 422, $validate->errors());
        }

        $ordenTrabajo = OrdenTrabajo::find($id);

        $ordenTrabajo->update([
            'quantity_used' => $request->quantity_used,
            'observations' => $request->observations ?? '',
            'date' => $request->date,
            'mantenimiento_id' => $request->mantenimiento_id,
            'inventario_pieza_id' => $request->inventario_pieza_id
        ]);

        return $this->jsonResponse([
            'message' => 'La orden de trabajo se actualizó correctamente'
        ], 200, []);
    }

    public function destroy($id)
    {
        $ordenTrabajo = OrdenTrabajo::find($id);

        $ordenTrabajo->delete();

        return $this->jsonResponse([
            'message' => 'La orden de trabajo se eliminó correctamente'
        ], 200, []);
    }
}
