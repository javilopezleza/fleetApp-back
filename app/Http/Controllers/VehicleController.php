<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest\UpdateVehicleRequest;
use App\Http\Requests\VehicleRequest\CreateVehicleRequest;

use App\Services\VehicleService;
use Illuminate\Http\JsonResponse;

class VehicleController extends Controller
{
    protected VehicleService $vehicleService;

    public function __construct(VehicleService $vehicleService)
    {
        $this->vehicleService = $vehicleService;
    }


    public function getAllVehicles(): JsonResponse
    {
        $vehicles = $this->vehicleService->getAllVehicles();
        return response()->json($vehicles);
    }

    public function getVehicleByPlate(string $plate): JsonResponse
    {
        $vehicle = $this->vehicleService->getVehicleByPlate($plate);
        return response()->json($vehicle);
    }

    public function getDriverByVehiclePlate(string $plate): JsonResponse
    {
        $vehicle = $this->vehicleService->getDriverByVehiclePlate($plate);
        return response()->json($vehicle);
    }

    public function createVehicle(CreateVehicleRequest $request): JsonResponse
    {
        $vehicle = $this->vehicleService->createVehicle(
            $request->validated()
        );
        return response()->json($vehicle, 201);
    }


    public function updateVehicle(UpdateVehicleRequest $request, string $plate): JsonResponse
    {
        $data = $request->validated();
        $vehicle = $this->vehicleService->updateVehicle($plate, $data);

        if ($vehicle) {
            return response()->json($vehicle);
        } else {
            return response()->json(['message' => 'Vehicle not found'], 404);
        }
    }

    public function deleteVehicle(string $plate): JsonResponse
    {
        $deleted = $this->vehicleService->deleteVehicle($plate);
        if ($deleted) {
            return response()->json((['message' => 'Vehicle deleted successfully']));
        } else {
            return response()->json((['message' => 'Vehicle not found']), 404);
        }
    }
}
