<?php

namespace Database\Seeders;

use App\Models\VehicleContact;
use Illuminate\Database\Seeder;

class VehicleContactSeeder extends Seeder
{
    public function run(): void
    {
        VehicleContact::create([
            'placa' => 'ABC123',
            'marca' => 'Toyota',
            'modelo' => 'Corolla',
            'anio_fabricacion' => 2020,
            'nombre_cliente' => 'Juan',
            'apellidos_cliente' => 'Pérez',
            'nro_documento_cliente' => '12345678',
            'correo_cliente' => 'juan@example.com',
            'telefono_cliente' => '555-1234',
        ]);

        VehicleContact::create([
            'placa' => 'DEF456',
            'marca' => 'Honda',
            'modelo' => 'Civic',
            'anio_fabricacion' => 2018,
            'nombre_cliente' => 'María',
            'apellidos_cliente' => 'Gómez',
            'nro_documento_cliente' => '87654321',
            'correo_cliente' => 'maria@example.com',
            'telefono_cliente' => '555-5678',
        ]);
    }
}