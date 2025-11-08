<?php

namespace App\Http\requests\DriverRequest;

use Illuminate\Foundation\Http\FormRequest;

class CreateDriverRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255|unique:conductor,nombre',
            'fecha_caducidad' => 'required|date',
            'puesto' => 'required|string|max:50',

        ];
    }


}
