<?php

namespace App\Http\requests\VehicleRequest;

use Illuminate\Foundation\Http\FormRequest;

class CreateVehicleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'matricula' => 'required|string|max:7|unique:vehiculo,matricula',
            'bastidor' => 'required|string|max:10|unique:vehiculo,bastidor',
            'marca' => 'required|string|max:20',
            'modelo' => 'required|string|max:20',
            'proxima_revision' => 'nullable|date'
        ];
    }


}
