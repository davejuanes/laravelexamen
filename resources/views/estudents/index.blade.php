@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Listado de Estudiantes</h2>
        <a href="{{ route('estudents.create') }}" class="btn btn-primary mb-3">Crear nuevo estudiante</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Listado de estudiantes') }}</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Ap. Paterno</th>
                                    <th>Ap. Materno</th>
                                    <th>Email</th>
                                    <th>CI</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            @php
                                $counter = 1;
                            @endphp
                            <tbody>
                                @foreach ($estudents as $estudent)
                                    <tr>
                                        <td class="text-center">{{ $counter++ }}</td>
                                        <td>{{ $estudent->nombre }}</td>
                                        <td>{{ $estudent->paterno }}</td>
                                        <td>{{ $estudent->materno }}</td>
                                        <td>{{ $estudent->email }}</td>
                                        <td>{{ $estudent->ci }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('estudents.edit', $estudent->id) }}"
                                                class="btn btn-warning btn-sm">Editar</a>
                                            <form action="{{ route('estudents.destroy', $estudent->id) }}" method="POST"
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
