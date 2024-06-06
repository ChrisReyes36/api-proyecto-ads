<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Traits\JsonResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    use JsonResponseTrait;

    public function index()
    {
        $clientes = Cliente::all();

        return $this->jsonResponse($clientes, 200, []);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:75',
            'address' => 'required|string',
            'phone' => 'required|string|max:10|unique:clientes',
            'email' => 'required|email|unique:clientes'
        ]);

        if ($validate->fails()) {
            return $this->jsonResponse([], 422, $validate->errors());
        }

        $cliente = Cliente::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email
        ]);

        return $this->jsonResponse([
            'message' => 'El cliente de ' . $cliente->name . ' se creó correctamente'
        ], 200, []);
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:75',
            'address' => 'required|string',
            'phone' => 'required|string|max:10|unique:clientes,phone,' . $id,
            'email' => 'required|email|unique:clientes,email,' . $id
        ]);

        if ($validate->fails()) {
            return $this->jsonResponse([], 422, $validate->errors());
        }

        $cliente = Cliente::find($id);

        $cliente->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email
        ]);

        return $this->jsonResponse([
            'message' => 'El cliente de ' . $cliente->name . ' se actualizó correctamente'
        ], 200, []);
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return $this->jsonResponse([], 404, ['message' => 'No se encontró el recurso']);
        }

        $cliente->delete();

        return $this->jsonResponse([
            'message' => 'El cliente de ' . $cliente->name . ' se eliminó correctamente'
        ], 200, []);
    }
}
