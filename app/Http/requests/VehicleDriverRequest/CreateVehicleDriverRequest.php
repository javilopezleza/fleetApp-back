<?php

namespace App\Http\requests\VehicleRequest;

use Illuminate\Foundation\Http\FormRequest;

class CreateVehicleDriverRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'vehiculo' => 'required|exists:vehiculo,matricula',
            'conductor' => 'required|exists:conductor,id',
            'fecha' => 'required|date',
        ];
    }


}
