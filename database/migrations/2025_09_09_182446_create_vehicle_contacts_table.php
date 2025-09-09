<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehicle_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('placa')->unique(); // Placa única
            $table->string('marca');
            $table->string('modelo');
            $table->year('anio_fabricacion');
            $table->string('nombre_cliente');
            $table->string('apellidos_cliente');
            $table->string('nro_documento_cliente')->unique();
            $table->string('correo_cliente')->unique();
            $table->string('telefono_cliente');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicle_contacts');
    }
};