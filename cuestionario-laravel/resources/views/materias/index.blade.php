@extends('layouts.app')

@section('title', 'Gestión de Materias')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h1 class="text-center text-primary">Gestión de Materias</h1>

        <!-- Botón para abrir el formulario de nueva materia -->
        <div class="text-end">
            <button class="btn btn-primary mt-3" onclick="document.getElementById('formNuevaMateria').classList.remove('d-none')">
                + Nueva Materia
            </button>
        </div>

        <!-- Formulario para agregar materia -->
        <div id="formNuevaMateria" class="card p-3 mt-3 d-none">
            <h4>Crear Nueva Materia</h4>
            <form action="{{ route('materias.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre de la materia" required>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('formNuevaMateria').classList.add('d-none')">Cancelar</button>
                </div>
            </form>
        </div>

        <!-- Lista de Materias -->
        <h2 class="mt-4 text-secondary">Materias Disponibles</h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>Materia</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($materias as $materia)
                    <tr>
                        <td>{{ $materia->nombre }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <form action="{{ route('materias.destroy', $materia->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                                <button class="btn btn-warning btn-sm" onclick="mostrarFormulario('{{ $materia->id }}')">Subir JSON</button>
                                @if ($materia->archivo_json)
                                <a href="{{ route('cuestionario', $materia->id) }}" class="btn btn-info btn-sm">Ver Cuestionario</a>
                                @endif
                            </div>
                        </td>
                    </tr>

                    <!-- Formulario para subir JSON -->
                    <tr id="formSubir_{{ $materia->id }}" class="d-none">
                        <td colspan="2" class="p-3">
                            <form action="{{ route('materias.upload', $materia->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="archivo_json" accept=".json" required class="form-control mb-2">
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success btn-sm">Subir JSON</button>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="document.getElementById('formSubir_{{ $materia->id }}').classList.add('d-none')">Cancelar</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function mostrarFormulario(id) {
        document.getElementById('formSubir_' + id).classList.remove('d-none');
    }
</script>
@endsection
