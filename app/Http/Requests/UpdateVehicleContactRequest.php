<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateVehicleContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('vehicleContact'); // Obtiene el ID del registro
        return [
            'placa' => ['required', 'string', 'max:20', Rule::unique('vehicle_contacts')->ignore($id)],
            'marca' => 'required|string|max:50',
            'modelo' => 'required|string|max:50',
            'anio_fabricacion' => 'required|integer|min:1900|max:' . date('Y'),
            'nombre_cliente' => 'required|string|max:50',
            'apellidos_cliente' => 'required|string|max:50',
            'nro_documento_cliente' => ['required', 'string', 'max:20', Rule::unique('vehicle_contacts')->ignore($id)],
            'correo_cliente' => ['required', 'email', Rule::unique('vehicle_contacts')->ignore($id)],
            'telefono_cliente' => 'required|string|max:15',
        ];
    }

    public function messages(): array
    {
        return [
            // Mensajes similares a StoreRequest
            'placa.required' => 'La placa es obligatoria.',
            'correo_cliente.email' => 'El correo debe ser válido.',
        ];
    }
}