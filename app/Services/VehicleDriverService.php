<?php

namespace App\Services;

use App\Models\VehicleDriver;
use Illuminate\Support\Collection;

class VehicleDriverService
{
    public function getAllVehicleDriver()
    {
        return VehicleDriver::all();
    }

    public function getAllWithRelations(): ?Collection
    {
        return VehicleDriver::with(['vehicle', 'driver'])->get();
    }

    public function getDriversByVehiclePlate(string $vehiclePlate): ?Collection
    {
        return VehicleDriver::with('driver', 'vehicle')
            ->where('vehiculo', $vehiclePlate)
            ->get();
    }
}
