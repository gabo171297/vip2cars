<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'placa' => 'required|string|max:20|unique:vehicle_contacts',
            'marca' => 'required|string|max:50',
            'modelo' => 'required|string|max:50',
            'anio_fabricacion' => 'required|integer|min:1900|max:' . date('Y'),
            'nombre_cliente' => 'required|string|max:50',
            'apellidos_cliente' => 'required|string|max:50',
            'nro_documento_cliente' => 'required|string|max:20|unique:vehicle_contacts',
            'correo_cliente' => 'required|email|unique:vehicle_contacts',
            'telefono_cliente' => 'required|string|max:15',
        ];
    }

    public function messages(): array
    {
        return [
            'placa.required' => 'La placa es obligatoria.',
            'placa.unique' => 'La placa ya está registrada.',
            'correo_cliente.email' => 'El correo debe ser válido.',
            'correo_cliente.unique' => 'El correo ya está en uso.',
            // Agrega más mensajes personalizados si lo deseas
        ];
    }
}