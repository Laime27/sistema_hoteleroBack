<?php

namespace App\Http\Controllers\nivel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\nivel;

class nivelController extends Controller
{

    public function index()
    {
        return response()->json(nivel::all());
    }

    public function show($id)
    {
        $nivel = nivel::find($id);
        if ($nivel) {
            return response()->json($nivel);
        } else {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
    }

    public function store(Request $request)
    {
        $nivel = new nivel();
        $nivel->nombre = $request->nombre;
        $nivel->save();

        return response()->json($nivel, 201);
    }

    public function update(Request $request, $id)
    {
        $nivel = nivel::find($id);
        if ($nivel) {
            $nivel->nombre = $request->nombre;

            $nivel->save();

            return response()->json($nivel);
        } else {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
    }


    public function destroy($id)
    {
        $nivel = nivel::find($id);
        if ($nivel) {
            $nivel->delete();
            return response()->json(null, 204);
        } else {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
    }
}
