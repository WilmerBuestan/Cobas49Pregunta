<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;
use Illuminate\Support\Facades\Storage;


class CuestionarioController extends Controller
{
    public function index()
    {
        // Leer el archivo JSON
        $json = file_get_contents(storage_path('json/preguntas.json'));
        $preguntas = json_decode($json, true);

        return view('cuestionario.index', compact('preguntas'));
    }

    public function responder(Request $request)
{
    // Obtener el ID de la materia desde el formulario
    $materiaId = $request->input('materia_id');

    // Buscar la materia en la base de datos
    $materia = Materia::findOrFail($materiaId);

    // Verificar si la materia tiene un archivo JSON asociado
    if (!$materia->archivo_json) {
        return redirect()->route('materias.index')->with('error', 'No hay preguntas para esta materia.');
    }

    // Cargar las preguntas desde el archivo JSON
    $json = Storage::get($materia->archivo_json);
    $preguntas = json_decode($json, true);

    $correctas = 0;
    foreach ($preguntas as $index => $pregunta) {
        if ($request->input("respuesta_$index") === $pregunta['respuesta']) {
            $correctas++;
        }
    }

    $total = count($preguntas);
    $nota = ($correctas / $total) * 10;

    return view('cuestionario.resultado', compact('nota', 'correctas', 'total', 'materiaId'));
}

    
    
}
