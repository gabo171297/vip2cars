@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Registro</h1>
        <form action="{{ route('vehicle-contacts.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Placa</label>
                <input type="text" name="placa" class="form-control @error('placa') is-invalid @enderror">
                @error('placa') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <!-- Repite para cada campo: marca, modelo, anio_fabricacion, nombre_cliente, apellidos_cliente, nro_documento_cliente, correo_cliente, telefono_cliente -->
            <div class="mb-3">
                <label>Marca</label>
                <input type="text" name="marca" class="form-control @error('marca') is-invalid @enderror">
                @error('marca') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label>Modelo</label>
                <input type="text" name="modelo" class="form-control @error('modelo') is-invalid @enderror">
                @error('modelo') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label>Año de Fabricación</label>
                <input type="number" name="anio_fabricacion" class="form-control @error('anio_fabricacion') is-invalid @enderror">
                @error('anio_fabricacion') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label>Nombre del Cliente</label>
                <input type="text" name="nombre_cliente" class="form-control @error('nombre_cliente') is-invalid @enderror">
                @error('nombre_cliente') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label>Apellidos del Cliente</label>
                <input type="text" name="apellidos_cliente" class="form-control @error('apellidos_cliente') is-invalid @enderror">
                @error('apellidos_cliente') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label>Nro. de Documento</label>
                <input type="text" name="nro_documento_cliente" class="form-control @error('nro_documento_cliente') is-invalid @enderror">
                @error('nro_documento_cliente') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label>Correo</label>
                <input type="email" name="correo_cliente" class="form-control @error('correo_cliente') is-invalid @enderror">
                @error('correo_cliente') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label>Teléfono</label>
                <input type="text" name="telefono_cliente" class="form-control @error('telefono_cliente') is-invalid @enderror">
                @error('telefono_cliente') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
@endsection