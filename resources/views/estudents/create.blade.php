@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Estudiante</h1>
        <form method="POST" action="{{ route('estudents.store') }}">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="mb-3">
                <label for="paterno" class="form-label">Apellido Paterno</label>
                <input type="text" class="form-control @error('paterno') is-invalid @enderror" id="paterno"
                    name="paterno" value="{{ old('paterno') }}" required>
                @error('paterno')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="materno" class="form-label">Apellido Materno</label>
                <input type="text" class="form-control @error('materno') is-invalid @enderror" id="materno"
                    name="materno" value="{{ old('materno') }}" required>
                @error('materno')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ci" class="form-label">Cédula de Identidad</label>
                <input type="number" class="form-control @error('ci') is-invalid @enderror" id="ci" name="ci"
                    value="{{ old('ci') }}" required>
                @error('ci')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
