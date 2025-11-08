<?php

namespace App\Services;

use App\Models\Driver;
use Illuminate\Database\Eloquent\Collection;

class DriverService
{
    public function getAllDrivers()
    {
        return Driver::all();
    }

    public function getDriverById(int $id)
    {
        return Driver::findOrFail($id);
    }

    public function getVehicleByDriverId(int $driverId): ?Collection
    {
        $vehicle = Driver::with('vehicles')->findOrFail($driverId);
        return $vehicle->vehicles;
    }

    public function createDriver(array $data): Driver
    {
        return Driver::create($data);
    }

    public function updateDriver(int $id, array $data): ?Driver
    {
        $driver = Driver::find($id);

        if ($driver) {
            $driver->fill($data);
            $driver->save();

            return $driver;
        }
        return null;
    }

    public function deleteDriver(int $id): bool
    {
        return Driver::destroy($id) > 0;
    }
}
