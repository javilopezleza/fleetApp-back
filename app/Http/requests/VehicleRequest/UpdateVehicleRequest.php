<?php

namespace App\Http\requests\VehicleRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVehicleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'matricula' => 'string|max:7|unique:vehiculo,matricula',
            'bastidor' => 'string|max:10|unique:vehiculo,bastidor',
            'marca' => 'string|max:20',
            'modelo' => 'string|max:20',
            'proxima_revision' => 'nullable|date'
        ];
    }
}
