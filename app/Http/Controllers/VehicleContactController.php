<?php

namespace App\Http\Controllers;

use App\Models\VehicleContact;
use App\Http\Requests\StoreVehicleContactRequest;
use App\Http\Requests\UpdateVehicleContactRequest;
use Illuminate\Http\Request;
use Exception;

class VehicleContactController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = VehicleContact::query();

            // Búsqueda por placa, nombre o correo
            if ($search = $request->query('search')) {
                $query->where(function ($q) use ($search) {
                    $q->where('placa', 'like', "%$search%")
                      ->orWhere('nombre_cliente', 'like', "%$search%")
                      ->orWhere('correo_cliente', 'like', "%$search%");
                });
            }

            $vehicleContacts = $query->paginate(10); // Paginación de 10 por página

            return view('vehicle-contacts.index', compact('vehicleContacts'));
        } catch (Exception $e) {
            return redirect()->route('vehicle-contacts.index')->with('error', 'Error al cargar los registros: ' . $e->getMessage());
        }
    }

    public function create()
    {
        return view('vehicle-contacts.create');
    }

    public function store(StoreVehicleContactRequest $request)
    {
        try {
            VehicleContact::create($request->validated());
            return redirect()->route('vehicle-contacts.index')->with('success', 'Registro creado exitosamente.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al crear el registro: ' . $e->getMessage());
        }
    }

    public function show(VehicleContact $vehicleContact)
    {
        return view('vehicle-contacts.show', compact('vehicleContact'));
    }

    public function edit(VehicleContact $vehicleContact)
    {
        return view('vehicle-contacts.edit', compact('vehicleContact'));
    }

    public function update(UpdateVehicleContactRequest $request, VehicleContact $vehicleContact)
    {
        try {
            $vehicleContact->update($request->validated());
            return redirect()->route('vehicle-contacts.index')->with('success', 'Registro actualizado exitosamente.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al actualizar el registro: ' . $e->getMessage());
        }
    }

    public function destroy(VehicleContact $vehicleContact)
    {
        try {
            $vehicleContact->delete();
            return redirect()->route('vehicle-contacts.index')->with('success', 'Registro eliminado exitosamente.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al eliminar el registro: ' . $e->getMessage());
        }
    }
}