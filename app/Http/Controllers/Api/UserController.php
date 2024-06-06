<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\JsonResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use JsonResponseTrait;

    public function index()
    {

        $users = User::where('id', '!=', auth()->user()->id)->with(['roles'])->get();

        return $this->jsonResponse($users, 200, []);
    }

    public function store(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:75',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'rol_id' => 'required'
        ]);

        if ($validate->fails()) {
            return $this->jsonResponse([], 422, $validate->errors());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $user->assignRole($request->rol_id);

        return $this->jsonResponse([
            'message' => 'El usuario de ' . $user->name . ' se creó correctamente'
        ], 200, []);
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();
        $validations = [
            'name' => 'required|string|max:75',
            'email' => 'required|email|unique:users,email,' . $id,
            'rol_id' => 'required'
        ];

        if ($request->password) {
            $validations['password'] = 'string|min:8';
        }

        $validate = Validator::make($data, $validations);

        if ($validate->fails()) {
            return $this->jsonResponse([], 422, $validate->errors());
        }

        $user = User::find($id);

        if (!$user) {
            return $this->jsonResponse([], 404, ['message' => 'No se encontró el recurso']);
        }

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            $data['password'] = $user->password;
        }

        $user->update($data);

        $user->syncRoles($request->rol_id);

        return $this->jsonResponse([
            'message' => 'El usuario de ' . $user->name . ' se actualizó correctamente'
        ], 200, []);
    }

    public function destroy($id)
    {

        $user = User::find($id);

        if (!$user) {
            return $this->jsonResponse([], 404, ['message' => 'No se encontró el recurso']);
        }

        $user->delete();

        return $this->jsonResponse([
            'message' => 'El usuario de ' . $user->name . ' se eliminó correctamente'
        ], 200, []);
    }
}
