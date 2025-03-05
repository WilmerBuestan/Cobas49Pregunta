@extends('layouts.app')

@section('title', 'Cuestionario Interactivo')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg p-4">
        <h1 class="text-center text-primary">Cuestionario</h1>
        
        <form method="POST" action="{{ route('cuestionario.responder') }}">
            @csrf
            <input type="hidden" name="materia_id" value="{{ request()->route('id') }}">

            @foreach ($preguntas as $index => $pregunta)
                <div id="pregunta_{{ $index }}" class="card p-3 mt-3">
                    <h5 class="text-dark">{{ $pregunta['pregunta'] }}</h5>
                    @foreach ($pregunta['opciones'] as $opcion)
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="respuesta_{{ $index }}" value="{{ $opcion }}"
                                onchange="verificarRespuesta({{ $index }}, '{{ $opcion }}', '{{ $pregunta['respuesta'] }}')">
                            <label class="form-check-label">{{ $opcion }}</label>
                        </div>
                    @endforeach
                </div>
            @endforeach

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success">Enviar Respuestas</button>
            </div>
        </form>
    </div>
</div>

<script>
    function verificarRespuesta(index, seleccionada, correcta) {
        let container = document.getElementById("pregunta_" + index);
        
        // Limpiar clases anteriores
        container.classList.remove("bg-success", "bg-danger", "text-white");

        // Aplicar el color correcto o incorrecto
        if (seleccionada === correcta) {
            container.classList.add("bg-success", "text-white"); // Verde
        } else {
            container.classList.add("bg-danger", "text-white"); // Rojo
        }
    }
</script>
@endsection
