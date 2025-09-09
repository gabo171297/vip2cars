<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'placa', 'marca', 'modelo', 'anio_fabricacion',
        'nombre_cliente', 'apellidos_cliente', 'nro_documento_cliente',
        'correo_cliente', 'telefono_cliente',
    ];
}