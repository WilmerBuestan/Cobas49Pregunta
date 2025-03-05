@extends('layouts.app')

@section('title', 'Resultados')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg p-4 text-center">
        <h1 class="text-primary">Resultados</h1>
        <p class="fs-4">Respuestas correctas: <strong>{{ $correctas }}</strong> de <strong>{{ $total }}</strong></p>
        <p class="fs-3">Tu nota es: <strong class="text-success">{{ $nota }}</strong></p>

        <a href="{{ route('cuestionario', ['id' => $materiaId]) }}" class="btn btn-info mt-3">Intentar de nuevo</a>
    </div>
</div>
@endsection
