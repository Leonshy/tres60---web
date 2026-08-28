<?php

return [
    'required' => 'El campo :attribute es obligatorio.',
    'string' => 'El campo :attribute debe ser texto.',
    'min' => [
        'string' => 'El campo :attribute debe tener al menos :min caracteres.',
    ],
    'max' => [
        'string' => 'El campo :attribute no puede tener más de :max caracteres.',
    ],
    'email' => 'El correo no tiene un formato válido.',
    'regex' => 'El campo :attribute tiene un formato inválido.',
    'integer' => 'El campo :attribute no es válido.',

    'attributes' => [
        'nombre' => 'nombre',
        'telefono' => 'teléfono',
        'ubicacion' => 'ubicación',
        'email' => 'correo',
    ],

    'custom' => [
        'nombre' => [
            'required' => 'El nombre es obligatorio.',
            'min' => 'El nombre debe tener al menos 2 caracteres.',
        ],
        'telefono' => [
            'required' => 'El teléfono es obligatorio.',
            'min' => 'El teléfono debe tener al menos 6 caracteres.',
            'regex' => 'El teléfono tiene un formato inválido.',
        ],
        'ubicacion' => [
            'required' => 'La ubicación del departamento es obligatoria.',
            'min' => 'La ubicación debe tener al menos 3 caracteres.',
        ],
    ],
];
