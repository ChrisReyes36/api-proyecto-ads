<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\InventarioPieza;
use App\Traits\JsonResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InventarioPiezaController extends Controller
{
    use JsonResponseTrait;

    public function index()
    {
        $piezas = InventarioPieza::with('ordenesTrabajo')->get();

        return $this->jsonResponse($piezas, 200, []);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'string',
            'quantity' => 'required|integer',
            'location' => 'required|string'
        ]);

        if ($validate->fails()) {
            return $this->jsonResponse([], 422, $validate->errors());
        }

        $pieza = InventarioPieza::create([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'location' => $request->location
        ]);

        return $this->jsonResponse([
            'message' => 'La pieza ' . $pieza->name . ' se creó correctamente'
        ], 200, []);
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'string',
            'quantity' => 'required|integer',
            'location' => 'required|string'
        ]);

        if ($validate->fails()) {
            return $this->jsonResponse([], 422, $validate->errors());
        }

        $pieza = InventarioPieza::find($id);

        $pieza->update([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'location' => $request->location
        ]);

        return $this->jsonResponse([
            'message' => 'La pieza ' . $pieza->name . ' se actualizó correctamente'
        ], 200, []);
    }

    public function destroy($id)
    {
        $pieza = InventarioPieza::find($id);

        $pieza->delete();

        return $this->jsonResponse([
            'message' => 'La pieza ' . $pieza->name . ' se eliminó correctamente'
        ], 200, []);
    }
}
