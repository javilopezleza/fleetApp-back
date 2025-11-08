<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleDriverController;
use Illuminate\Support\Facades\Route;


Route::prefix('vehicles')->group(function () {
    Route::get('/', [VehicleController::class, 'getAllVehicles']); //Get all vehicless from DB.
    Route::get('{plate}', [VehicleController::class, 'getVehicleByPlate']); //Get vehicles by ID.
    Route::post('/', [VehicleController::class, 'createVehicle']); // Create vehicles.
    Route::patch('{plate}', [VehicleController::class, 'updateVehicle']); // Update vehicles.
    Route::delete('{plate}', [VehicleController::class, 'deleteVehicle']); // Delete vehicles.
});

Route::prefix('drivers')->group(function () {
     Route::get('/', [DriverController::class, 'getAllDrivers']); //Get all Drivers from DB.
    Route::get('{id}', [DriverController::class, 'getDriverById']); //Get Driver by ID.
    Route::post('/', [DriverController::class, 'createDriver']); // Create Driver.
    Route::patch('{id}', [DriverController::class, 'updateDriver']); // Update Driver.
    Route::delete('{id}', [DriverController::class, 'deleteDriver']); // Delete Driver.
});
Route::prefix('vehicle-driver')->group(function () {
    Route::get('/', [VehicleDriverController::class, 'getAllVehicleDriver']); //Get all relations Vehicle-Drivers from DB.
    Route::get('/full', [VehicleDriverController::class, 'getAllWithRelations']); //Get the full relations ( Driver too ) between Vehicle-Driver.
    Route::get('/{plate}', [VehicleDriverController::class, 'getDriversByVehiclePlate']); //Get all the drivers associated to a Vehicle plate.
});

