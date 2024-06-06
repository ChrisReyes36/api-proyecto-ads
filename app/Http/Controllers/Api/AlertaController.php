<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Alerta;
use App\Traits\JsonResponseTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlertaController extends Controller
{
    use JsonResponseTrait;

    public function index()
    {
        $alertas = Alerta::with('contrato')->get();

        return $this->jsonResponse($alertas, 200, []);
    }

    public function store(Request $request)
    {
        $date = Carbon::now();

        $validate = Validator::make($request->all(), [
            'description' => 'required|string',
            'status' => 'required|string',
            'contrato_id' => 'required|integer|exists:contratos,id'
        ]);

        if ($validate->fails()) {
            return $this->jsonResponse([], 422, $validate->errors());
        }

        Alerta::create([
            'alert_date' => $date->format('Y-m-d'),
            'alert_time' => $date->format('H:i:s'),
            'description' => $request->description,
            'status' => $request->status,
            'contrato_id' => $request->contrato_id
        ]);

        return $this->jsonResponse([
            'message' => 'La alerta se creó correctamente'
        ], 200, []);
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'description' => 'required|string',
            'status' => 'required|string',
            'contrato_id' => 'required|integer|exists:contratos,id'
        ]);

        if ($validate->fails()) {
            return $this->jsonResponse([], 422, $validate->errors());
        }

        $alerta = Alerta::find($id);

        $alerta->update([
            'description' => $request->description,
            'status' => $request->status,
            'contrato_id' => $request->contrato_id
        ]);

        return $this->jsonResponse([
            'message' => 'La alerta se actualizó correctamente'
        ], 200, []);
    }

    public function destroy($id)
    {
        $alerta = Alerta::find($id);

        $alerta->delete();

        return $this->jsonResponse([
            'message' => 'La alerta se eliminó correctamente'
        ], 200, []);
    }
}
