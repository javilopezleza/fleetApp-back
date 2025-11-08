<?php

namespace App\Services;

use App\Models\Driver;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Collection;

class VehicleService
{
    public function getAllVehicles()
    {
        return Vehicle::all();
    }

    public function getVehicleByPlate(string $plate)
    {
        return Vehicle::where('matricula', $plate)->firstOrFail();
    }

    public function getDriverByVehiclePlate(string $vehiclePlate): ?Collection
    {
        return Driver::whereHas('vehicles', function ($query) use ($vehiclePlate) {
            $query->where('matricula', $vehiclePlate);
        })->get();
    }

    public function createVehicle(array $data): Vehicle
    {
        return Vehicle::create($data);
    }

    public function updateVehicle(string $plate, array $data): ?Vehicle
    {
        $vehicle = Vehicle::where('matricula', $plate)->first();

        if ($vehicle) {
            $vehicle->fill($data);
            $vehicle->save();
            return $vehicle;
        }

        return null;
    }

    public function deleteVehicle(string $plate)
    {
        return Vehicle::destroy($plate) > 0;
    }
}
