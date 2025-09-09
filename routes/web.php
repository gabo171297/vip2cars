<?php

use App\Http\Controllers\VehicleContactController;
use Illuminate\Support\Facades\Route;

Route::resource('vehicle-contacts', VehicleContactController::class);