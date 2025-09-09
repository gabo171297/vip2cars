@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Registro</h1>
        <form action="{{ route('vehicle-contacts.update', $vehicleContact) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label>Placa</label>
                <input type="text" name="placa" value="{{ $vehicleContact->placa }}" class="form-control @error('placa') is-invalid @enderror">
                @error('placa') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <!-- Repite para cada campo, usando value="{{ $vehicleContact->campo }}" -->
            <div class="mb-3">
                <label>Marca</label>
                <input type="text" name="marca" value="{{ $vehicleContact->marca }}" class="form-control @error('marca') is-invalid @enderror">
                @error('marca') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <!-- ... (agrega los demás campos similares a create) ... -->
            <button type="submit" class="btn btn-success">Actualizar</button>
        </form>
    </div>
@endsection