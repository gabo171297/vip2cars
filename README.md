<p align="center"><a href="https://vip2cars.com/contacto/?utm_term=&utm_campaign=01_CAM_MAXIMO_RENDIMIENTO_WSP_REGISTROS_05/03/2025&utm_source=adwords&utm_medium=ppc&hsa_acc=2394397448&hsa_cam=22399442624&hsa_grp=&hsa_ad=&hsa_src=x&hsa_tgt=&hsa_kw=&hsa_mt=&hsa_net=adwords&hsa_ver=3&gad_source=1&gad_campaignid=22392981549" target="_blank"><img src="https://i.imgur.com/n8iX2wo.png" width="400" alt="VIP2CARS Logo"></a></p>



VIP2CARS - Sistema CRUD de Vehículos y Contactos

Sistema desarrollado en Laravel para gestionar registros de vehículos y sus propietarios en el contexto del rubro automotriz. Incluye operaciones CRUD (Crear, Leer, Actualizar, Eliminar) con validaciones, paginación, búsqueda, manejo de errores y un diseño estilizado con Bootstrap.

🔧 Requisitos del Entorno

PHP: Versión 8.1 o superior

Composer: Última versión (para gestión de dependencias)

Base de Datos: MySQL 5.7+ o MariaDB

Extensiones de PHP:

pdo_mysql

mbstring

json

bcmath

openssl

xml

ctype

tokenizer

Node.js y npm: Opcional, solo si planeas compilar assets con Laravel Mix o Vite

Servidor Web: Laravel incluye un servidor de desarrollo (php artisan serve), pero puedes usar Apache/Nginx para producción

Git: Para clonar y gestionar el repositorio

🧰 Instalación y Configuración

Clonar el repositorio:

git clone <URL_DEL_REPOSITORIO> cd vip2cars

Instalar dependencias:

composer install

Configurar el archivo de entorno:

Copia el archivo .env.example a .env:

cp .env.example .env

Edita .env con tu configuración de base de datos:

DB_CONNECTION=mysql DB_HOST=127.0.0.1 DB_PORT=3306 DB_DATABASE=vip2cars_db DB_USERNAME=root DB_PASSWORD=tu_contraseña

Crea la base de datos vip2cars_db en MySQL:

mysql -u root -p -e "CREATE DATABASE vip2cars_db;"

Generar la clave de la aplicación:

php artisan key:generate

▶️ Puesta en Marcha

Ejecutar las migraciones para crear las tablas en la base de datos:

php artisan migrate

Ejecutar el seeder (opcional, para poblar la base con datos de prueba):

php artisan db:seed --class=VehicleContactSeeder

Iniciar el servidor de desarrollo:

php artisan serve

Acceder a la aplicación:

Abre http://127.0.0.1:8000/vehicle-contacts en tu navegador.

La aplicación mostrará una lista de registros con opciones para crear, editar, ver o eliminar.

🗄️ Estructura de la Base de Datos

La base de datos utiliza una única tabla vehicle_contacts para almacenar información de vehículos y sus propietarios. A continuación, se detalla la estructura:

Tabla: vehicle_contacts

Columna

Tipo

Descripción

Restricciones

id

BIGINT

Identificador único

PK, Auto-incremental

placa

VARCHAR(20)

Placa del vehículo

Única

marca

VARCHAR(50)

Marca del vehículo

modelo

VARCHAR(50)

Modelo del vehículo

anio_fabricacion

YEAR

Año de fabricación del vehículo

nombre_cliente

VARCHAR(50)

Nombre del propietario

apellidos_cliente

VARCHAR(50)

Apellidos del propietario

nro_documento_cliente

VARCHAR(20)

Número de documento del propietario

Única

correo_cliente

VARCHAR(255)

Correo electrónico del propietario

Única

telefono_cliente

VARCHAR(15)

Teléfono del propietario

created_at

TIMESTAMP

Fecha de creación

updated_at

TIMESTAMP

Fecha de última actualización

Script de Migración

El archivo de migración se encuentra en database/migrations/xxxx_xx_xx_create_vehicle_contacts_table.php:

use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;

return new class extends Migration { public function up(): void { Schema::create('vehicle_contacts', function (Blueprint $table) { $table->id(); $table->string('placa')->unique(); $table->string('marca'); $table->string('modelo'); $table->year('anio_fabricacion'); $table->string('nombre_cliente'); $table->string('apellidos_cliente'); $table->string('nro_documento_cliente')->unique(); $table->string('correo_cliente')->unique(); $table->string('telefono_cliente'); $table->timestamps(); }); }

public function down(): void
{
    Schema::dropIfExists('vehicle_contacts');
}
};

🔑 Usuario Demo

Este proyecto no incluye un sistema de autenticación, pero se proporcionan datos de prueba a través del seeder (VehicleContactSeeder) para simular registros de vehículos y contactos. Al ejecutar el seeder, se crean los siguientes registros de ejemplo:

Registro 1:

Placa: ABC123

Marca: Toyota

Modelo: Corolla

Año de Fabricación: 2020

Nombre Cliente: Juan

Apellidos Cliente: Pérez

Nro. Documento: 12345678

Correo: juan@example.com

Teléfono: 555-1234

Registro 2:

Placa: DEF456

Marca: Honda

Modelo: Civic

Año de Fabricación: 2018

Nombre Cliente: María

Apellidos Cliente: Gómez

Nro. Documento: 87654321

Correo: maria@example.com

Teléfono: 555-5678

Para poblar la base de datos con estos datos:

php artisan db:seed --class=VehicleContactSeeder

Notas Adicionales

Validaciones: El sistema incluye validaciones en los formularios (usando StoreVehicleContactRequest y UpdateVehicleContactRequest) para garantizar que los datos sean correctos (placa única, correo válido, etc.).

Paginación y Búsqueda: La vista principal (index) incluye paginación (10 registros por página) y búsqueda por placa, nombre o correo.

Manejo de Errores: Los errores se capturan en el controlador con try-catch y se muestran como alertas en la interfaz.

Estilos: La interfaz usa Bootstrap 5.3 desde un CDN para un diseño limpio y responsivo.

Depuración: Si encuentras problemas, limpia la caché con:

php artisan cache:clear php artisan view:clear php artisan config:clear
