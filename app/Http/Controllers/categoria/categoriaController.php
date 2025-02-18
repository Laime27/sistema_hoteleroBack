<?php

namespace App\Http\Controllers\categoria;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categoria;

class categoriaController extends Controller
{
    public function index()
    {   
        $categoria = Categoria::orderBy('id', 'desc')->paginate(5);

        return response()->json($categoria);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        $categoria = categoria::create($request->all());
        return response()->json($categoria, 201);
    }

    public function show($id)
    {
        return response()->json(categoria::find($id));
    }

    public function update(Request $request, $id)
    {   
        $request->validate([
            'nombre' => 'required',
        ]);

        $categoria = categoria::find($id);

        $categoria->update($request->all());
        return response()->json($categoria, 200);
    }

    public function destroy($id)
    {
        categoria::find($id)->delete();
        return response()->json(null, 204);
    }


}
