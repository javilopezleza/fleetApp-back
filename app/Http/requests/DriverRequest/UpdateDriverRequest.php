<?php

namespace App\Http\requests\DriverRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDriverRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'string|max:255',
            'fecha_caducidad' => 'date',
            'puesto' => 'string|max:50',
        ];
    }
}
