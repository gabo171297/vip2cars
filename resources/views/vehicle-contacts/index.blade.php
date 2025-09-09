@extends('layouts.app') 
@section('content')
    <div class="container">
        <h1>Vehículos y Contactos</h1>
        <a href="{{ route('vehicle-contacts.create') }}" class="btn btn-primary">Nuevo Registro</a>
        <form action="{{ route('vehicle-contacts.index') }}" method="GET" class="mt-3">
            <input type="text" name="search" placeholder="Buscar por placa, nombre o correo" class="form-control d-inline-block w-50">
            <button type="submit" class="btn btn-secondary">Buscar</button>
        </form>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Placa</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Cliente</th>
                    <th>Documento</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicleContacts as $vc)
                    <tr>
                        <td>{{ $vc->placa }}</td>
                        <td>{{ $vc->marca }}</td>
                        <td>{{ $vc->modelo }}</td>
                        <td>{{ $vc->anio_fabricacion }}</td>
                        <td>{{ $vc->nombre_cliente }} {{ $vc->apellidos_cliente }}</td>
                        <td>{{ $vc->nro_documento_cliente }}</td>
                        <td>{{ $vc->correo_cliente }}</td>
                        <td>{{ $vc->telefono_cliente }}</td>
                        <td>
                            <a href="{{ route('vehicle-contacts.show', $vc) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('vehicle-contacts.edit', $vc) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('vehicle-contacts.destroy', $vc) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $vehicleContacts->links() }}  <!-- Paginación -->
    </div>
@endsection