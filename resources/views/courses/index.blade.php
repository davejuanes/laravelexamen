@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Listado de Cursos</h2>
        <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Crear Curso</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Listado de Cursos') }}</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Duración (Horas)</th>
                                    <th>Portada</th>
                                    <th>Fecha de Inicio</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $course)
                                    <tr>
                                        <td class="text-center">{{ $course->id }}</td>
                                        <td>{{ $course->nombre }}</td>
                                        <td class="text-center">{{ $course->duracion }}</td>
                                        <td>{{ $course->portada }}</td>
                                        <td class="text-center">{{ date('d/m/Y', strtotime($course->fechainicio)) }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('courses.edit', $course->id) }}"
                                                class="btn btn-warning btn-sm">Editar</a>
                                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST"
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
