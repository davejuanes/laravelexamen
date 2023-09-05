@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Listado de Matriculas</h2>
        <a href="{{ route('matriculas.create') }}" class="btn btn-primary mb-3">Crear nueva matricula</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Listado de matriculas') }}</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Estudiante</th>
                                    <th>Curso</th>
                                    <th>Fecha Matriculacion</th>
                                    <th>Nota</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            @php
                                $counter = 1;
                            @endphp
                            <tbody>
                                @foreach ($matriculas as $matricula)
                                    <tr>
                                        <td class="text-center">{{ $counter++ }}</td>
                                        <td>{{ $matricula->paterno }} {{ $matricula->materno }} {{ $matricula->nombre_estudent }}</td>
                                        <td>{{ $matricula->nombre_curso }}</td>
                                        <td class="text-center">{{ date('d/m/Y', strtotime($matricula->fechamatriculacion)) }}</td>
                                        <td class="text-center">{{ $matricula->nota }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('matriculas.edit', $matricula->matricula_id) }}"
                                                class="btn btn-warning btn-sm">Editar</a>
                                            <form action="{{ route('matriculas.destroy', $matricula->matricula_id) }}" method="POST"
                                                style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
