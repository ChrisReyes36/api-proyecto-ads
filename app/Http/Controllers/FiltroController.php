<?php

namespace App\Http\Controllers;

use App\Models\Filtro;
use App\Traits\JsonResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FiltroController extends Controller
{
    use JsonResponseTrait;

    public function index()
    {
        $filtros = Filtro::all();

        return $this->jsonResponse($filtros, 200, []);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'model' => 'required|string|max:75',
            'brand' => 'required|string|max:75',
            'description' => 'required|string',
            'acquisition_date' => 'required|date'
        ]);

        if ($validate->fails()) {
            return $this->jsonResponse([], 422, $validate->errors());
        }

        $filtro = Filtro::create([
            'model' => $request->model,
            'brand' => $request->brand,
            'description' => $request->description,
            'acquisition_date' => $request->acquisition_date
        ]);

        return $this->jsonResponse([
            'message' => 'El filtro de ' . $filtro->model . ' se creó correctamente'
        ], 200, []);
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'model' => 'required|string|max:75',
            'brand' => 'required|string|max:75',
            'description' => 'required|string',
            'acquisition_date' => 'required|date'
        ]);

        if ($validate->fails()) {
            return $this->jsonResponse([], 422, $validate->errors());
        }

        $filtro = Filtro::find($id);

        $filtro->update([
            'model' => $request->model,
            'brand' => $request->brand,
            'description' => $request->description,
            'acquisition_date' => $request->acquisition_date
        ]);

        return $this->jsonResponse([
            'message' => 'El filtro de ' . $filtro->model . ' se actualizó correctamente'
        ], 200, []);
    }

    public function destroy($id)
    {
        $filtro = Filtro::find($id);

        $filtro->delete();

        return $this->jsonResponse([
            'message' => 'El filtro de ' . $filtro->model . ' se eliminó correctamente'
        ], 200, []);
    }
}
