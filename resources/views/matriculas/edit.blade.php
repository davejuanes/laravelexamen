@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar matricula</h1>
        <form method="POST" action="{{ route('matriculas.update', $matricula->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nombre" class="form-label">Estudiante</label>
                <select class="form-control" name="estudent_id" id="estudent_id" required>
                    @foreach ($estudents as $estudent)
                        @if ($estudent->id == $matricula->estudent_id)
                            <option value="{{ $estudent->id }}" selected>{{ $estudent->paterno }} {{ $estudent->materno }}
                                {{ $estudent->nombre }}</option>
                        @else
                            <option value="{{ $estudent->id }}">{{ $estudent->paterno }} {{ $estudent->materno }}
                                {{ $estudent->nombre }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="course_id" class="form-label">Curso</label>
                <select class="form-control" name="course_id" id="course_id" required>
                    <option value="">Seleccionar</option>
                    @foreach ($courses as $course)
                        @if ($course->id == $matricula->course_id)
                            <option value="{{ $course->id }}" selected>{{ $course->nombre }}</option>
                        @else
                            <option value="{{ $course->id }}">{{ $course->nombre }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="fechamatriculacion" class="form-label">Fecha matriculación</label>
                <input type="date" class="form-control @error('fechamatriculacion') is-invalid @enderror" id="fechamatriculacion" name="fechamatriculacion" value="{{ old('fechamatriculacion', $matricula->fechamatriculacion) }}" required>
                @error('fechamatriculacion')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nota" class="form-label">Nota</label>
                <input type="number" class="form-control @error('nota') is-invalid @enderror" id="nota" name="nota" value="{{ old('nota', $matricula->nota) }}" required>
                @error('nota')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
@endsection
