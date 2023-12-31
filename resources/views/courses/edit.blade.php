@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Curso</h2>
    <form method="POST" action="{{ route('courses.update', $course->id) }}" class="needs-validation" novalidate>
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $course->nombre }}" required>
        </div>
        <div class="mb-3">
            <label for="duracion">Duración (en horas):</label>
            <input type="number" class="form-control" max="1000" id="duracion" name="duracion" value="{{ $course->duracion }}" required>
        </div>
        <div class="mb-3">
            <label for="portada">Portada:</label>
            <input type="file" class="form-control" id="portada" name="portada" required>
            <a href="{{ $course->portada }}">Adjunto</a>
        </div>
        <div class="mb-3">
            <label for="fechainicio">Fecha de Inicio:</label>
            <input type="date" class="form-control" id="fechainicio" name="fechainicio" value="{{ $course->fechainicio }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@endsection