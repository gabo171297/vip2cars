@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Registro</h1>
        <p><strong>Placa:</strong> {{ $vehicleContact->placa }}</p>
        <p><strong>Marca:</strong> {{ $vehicleContact->marca }}</p>
        <p><strong>Modelo:</strong> {{ $vehicleContact->modelo }}</p>
        <p><strong>Año:</strong> {{ $vehicleContact->anio_fabricacion }}</p>
        <p><strong>Cliente:</strong> {{ $vehicleContact->nombre_cliente }} {{ $vehicleContact->apellidos_cliente }}</p>
        <p><strong>Documento:</strong> {{ $vehicleContact->nro_documento_cliente }}</p>
        <p><strong>Correo:</strong> {{ $vehicleContact->correo_cliente }}</p>
        <p><strong>Teléfono:</strong> {{ $vehicleContact->telefono_cliente }}</p>
        <a href="{{ route('vehicle-contacts.index') }}" class="btn btn-secondary">Volver</a>
    </div>
@endsection