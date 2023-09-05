@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Matricula</h1>
    <form method="POST" action="{{ route('matriculas.store') }}" class="needs-validation" novalidate>
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Estudiante</label>
            <select class="form-control" name="estudent_id" id="estudent_id" required>
                <option value="">Seleccionar</option>
                @foreach ($estudents as $estudent)
                    <option value="{{ $estudent->id }}">{{ $estudent->paterno }} {{ $estudent->materno }} {{ $estudent->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="course_id" class="form-label">Curso</label>
            <select class="form-control" name="course_id" id="course_id" required>
                <option value="">Seleccionar</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fechamatriculacion" class="form-label">Fecha matriculación</label>
            <input type="date" class="form-control @error('fechamatriculacion') is-invalid @enderror" id="fechamatriculacion" name="fechamatriculacion" value="{{ old('fechamatriculacion') }}" required>
            @error('fechamatriculacion')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nota" class="form-label">Nota</label>
            <input type="number" max="100" class="form-control @error('nota') is-invalid @enderror" id="nota" name="nota" value="{{ old('nota') }}" required>
            @error('nota')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
