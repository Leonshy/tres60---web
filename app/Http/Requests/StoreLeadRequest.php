<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => ['required', 'string', 'min:2', 'max:80'],
            'telefono' => ['required', 'string', 'min:6', 'max:25', 'regex:/^[0-9+()\s.-]+$/'],
            'ubicacion' => ['required', 'string', 'min:3', 'max:160'],
            'email' => ['nullable', 'email', 'max:255'],
            'empresa_web' => ['nullable', 'string'],
            '_ts' => ['required', 'integer'],
            '_sig' => ['required', 'string'],
        ];
    }
}
