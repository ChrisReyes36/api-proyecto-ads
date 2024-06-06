<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contrato;
use App\Traits\JsonResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContratoController extends Controller
{
    use JsonResponseTrait;

    public function index()
    {
        $contratos = Contrato::with('cliente', 'filtro', 'alertas', 'mantenimientos')->get();

        return $this->jsonResponse($contratos, 200, []);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'maintenance_plan' => 'required|string',
            'cliente_id' => 'required|integer|exists:clientes,id',
            'filtro_id' => 'required|integer|exists:filtros,id'
        ]);

        if ($validate->fails()) {
            return $this->jsonResponse([], 422, $validate->errors());
        }

        $contrato = Contrato::create([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'maintenance_plan' => $request->maintenance_plan,
            'cliente_id' => $request->cliente_id,
            'filtro_id' => $request->filtro_id
        ]);

        return $this->jsonResponse([
            'message' => 'El contrato ' . $contrato->contract_number . ' se creó correctamente'
        ], 200, []);
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'maintenance_plan' => 'required|string',
            'cliente_id' => 'required|integer|exists:clientes,id',
            'filtro_id' => 'required|integer|exists:filtros,id'
        ]);

        if ($validate->fails()) {
            return $this->jsonResponse([], 422, $validate->errors());
        }

        $contrato = Contrato::find($id);

        $contrato->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'maintenance_plan' => $request->maintenance_plan,
            'cliente_id' => $request->cliente_id,
            'filtro_id' => $request->filtro_id
        ]);

        return $this->jsonResponse([
            'message' => 'El contrato ' . $contrato->contract_number . ' se actualizó correctamente'
        ], 200, []);
    }

    public function destroy($id)
    {
        $contrato = Contrato::find($id);

        $contrato->delete();

        return $this->jsonResponse([
            'message' => 'El contrato ' . $contrato->contract_number . ' se eliminó correctamente'
        ], 200, []);
    }
}
