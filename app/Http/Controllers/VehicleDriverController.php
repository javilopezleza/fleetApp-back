<?php


namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest\CreateVehicleDriverRequest;
use App\Services\VehicleDriverService;
use Illuminate\Http\JsonResponse;

class VehicleDriverController extends Controller
{
    protected VehicleDriverService $vehicleDriverService;

    public function __construct(VehicleDriverService $vehicleDriverService)
    {
        $this->vehicleDriverService = $vehicleDriverService;
    }

    public function getAllVehicleDriver(): JsonResponse
    {
        $vehicleDriver = $this->vehicleDriverService->getAllVehicleDriver();
        return response()->json($vehicleDriver);
    }

    public function getAllWithRelations(): JsonResponse
    {
        $vehicleDriver = $this->vehicleDriverService->getAllWithRelations();
        return response()->json($vehicleDriver);
    }

    public function getDriversByVehiclePlate(string $plate): JsonResponse
    {
        $vehicleDriverRelation = $this->vehicleDriverService->getDriversByVehiclePlate($plate);
        return response()->json($vehicleDriverRelation);
    }
}
