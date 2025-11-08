<?php

namespace App\Http\Controllers;

use App\Http\Requests\DriverRequest\CreateDriverRequest;
use App\Http\Requests\DriverRequest\UpdateDriverRequest;


use App\Services\DriverService;
use Illuminate\Http\JsonResponse;

class DriverController extends Controller
{

    protected DriverService $driverService;

    public function __construct(DriverService $driverService)
    {
        $this->driverService = $driverService;
    }

    public function getAllDrivers(): JsonResponse
    {
        $drivers = $this->driverService->getAllDrivers();
        return response()->json($drivers);
    }

    public function getDriverById(int $id): JsonResponse
    {
        $driver = $this->driverService->getDriverById($id);
        return response()->json($driver);
    }

    public function getVehicleByDriverId(int $id): JsonResponse
    {
        $driver = $this->driverService->getVehicleByDriverId($id);
        return response()->json($driver);
    }

    public function createDriver(CreateDriverRequest $request): JsonResponse
    {
        $driver = $this->driverService->createDriver($request->validated());
        return response()->json($driver, 201);
    }

    public function updateDriver(UpdateDriverRequest $request, int $id): JsonResponse
    {
        $data = $request->validated();
        $driver = $this->driverService->updateDriver($id, $data);

        if($driver){
            return response()->json($driver);
        }else{
            return response()->json(['message' => 'Driver not found'], 404);
        }
    }

    public function deleteDriver(int $id):JsonResponse
    {
         $deleted = $this->driverService->deleteDriver($id);
        if($deleted){
           return response()->json((['message' => 'Driver deleted successfully']));
        }else{
            return response()->json((['message' => 'Driver not found']), 404);
        }
    }
}
