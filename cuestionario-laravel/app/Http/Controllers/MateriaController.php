<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;
use Illuminate\Support\Facades\Storage;

class MateriaController extends Controller
{
    public function index()
    {
        $materias = Materia::all();
        return view('materias.index', compact('materias'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:materias'
        ]);

        Materia::create(['nombre' => $request->nombre]);

        return redirect()->route('materias.index')->with('success', 'Materia creada correctamente.');
    }

    public function destroy($id)
    {
        $materia = Materia::findOrFail($id);
        $materia->delete();

        return redirect()->route('materias.index')->with('success', 'Materia eliminada correctamente.');
    }

    public function uploadJson(Request $request, $id)
    {
        $request->validate([
            'archivo_json' => 'required|mimes:json'
        ]);

        $materia = Materia::findOrFail($id);
        $path = $request->file('archivo_json')->store('json');

        $materia->update(['archivo_json' => $path]);

        return redirect()->route('materias.index')->with('success', 'Archivo JSON subido correctamente.');
    }
}
