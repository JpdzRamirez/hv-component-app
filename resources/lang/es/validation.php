<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */
    'accepted'             => ':attribute debe ser aceptado.',
    'active_url'           => ':attribute no es una URL válida.',
    'after'                => ':attribute debe ser una fecha posterior a :date.',
    'alpha'                => ':attribute solo debe contener letras.',
    'alpha_dash'           => ':attribute solo debe contener letras, números y guiones.',
    'alpha_num'            => ':attribute solo debe contener letras y números.',
    'array'                => ':attribute debe ser un conjunto.',
    'before'               => ':attribute debe ser una fecha anterior a :date.',
    'between'              => [
        'numeric' => ':attribute tiene que estar entre :min - :max.',
        'file'    => ':attribute debe pesar entre :min - :max kilobytes.',
        'string'  => ':attribute tiene que tener entre :min - :max caracteres.',
        'array'   => ':attribute tiene que tener entre :min - :max ítems.',
    ],
    'boolean'              => 'El campo :attribute debe tener un valor verdadero o falso.',
    'confirmed'            => 'La confirmación de :attribute no coincide.',
    'date'                 => ':attribute no es una fecha válida.',
    'date_format'          => ':attribute no corresponde al formato :format.',
    'different'            => ':attribute y :other deben ser diferentes.',
    'digits'               => ':attribute debe tener :digits dígitos.',
    'digits_between'       => ':attribute debe tener entre :min y :max dígitos.',
    'distinct'             => 'El campo :attribute contiene un valor duplicado.',
    'email'                => ':attribute no es un correo válido',
    'exists'               => ':attribute es inválido.',
    'filled'               => 'El campo :attribute es obligatorio.',
    'image'                => ':attribute debe ser una imagen.',
    'in'                   => ':attribute es inválido.',
    'in_array'             => 'El campo :attribute no existe en :other.',
    'integer'              => ':attribute debe ser un número entero.',
    'ip'                   => ':attribute debe ser una dirección IP válida.',
    'json'                 => 'El campo :attribute debe tener una cadena JSON válida.',
    'max'                  => [
        'numeric' => ':attribute no debe ser mayor a :max.',
        'file'    => ':attribute no debe ser mayor que :max kilobytes.',
        'string'  => ':attribute no debe ser mayor que :max caracteres.',
        'array'   => ':attribute no debe tener más de :max elementos.',
    ],
    'mimes'                => ':attribute debe ser un archivo con formato: :values.',
    'min'                  => [
        'numeric' => 'El tamaño de :attribute debe ser de al menos :min.',
        'file'    => 'El tamaño de :attribute debe ser de al menos :min kilobytes.',
        'string'  => ':attribute debe contener al menos :min caracteres.',
        'array'   => ':attribute debe tener al menos :min elementos.',
    ],
    'not_in'               => ':attribute es inválido.',
    'numeric'              => ':attribute debe ser numérico.',
    'present'              => 'El campo :attribute debe estar presente.',
    'regex'                => 'El formato de :attribute es inválido.',
    'required'             => 'El campo :attribute es obligatorio.',
    'required_if'          => 'El campo :attribute es obligatorio cuando :other es :value.',
    'required_unless'      => 'El campo :attribute es obligatorio a menos que :other esté en :values.',
    'required_with'        => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_with_all'    => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_without'     => 'El campo :attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de :values estén presentes.',
    'same'                 => ':attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => 'El tamaño de :attribute debe ser :size.',
        'file'    => 'El tamaño de :attribute debe ser :size kilobytes.',
        'string'  => ':attribute debe contener :size caracteres.',
        'array'   => ':attribute debe contener :size elementos.',
    ],
    'string'               => 'El campo :attribute debe ser una cadena de caracteres.',
    'timezone'             => 'El :attribute debe ser una zona válida.',
    'unique'               => ':attribute ya ha sido registrado.',
    'url'                  => 'El formato :attribute es inválido.',
    'captcha'              => 'El código captcha ingresado no es correcto',
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */
    'custom' => [
        'photo' => [
            'nullable' => 'El campo de la foto es opcional.',
            'image' => 'El archivo debe ser una imagen válida.',
            'mimes' => 'La imagen debe ser de tipo: jpg, jpeg, png.',
            'max' => 'La imagen no debe superar los 2 MB.',
        ],
        'description' => [
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El :attribute debe ser una cadena de texto.',
            'max' => 'El :attribute no debe exceder :max caracteres.',
        ],
        'firstName' => [
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El campo :attribute solo admite caracteres',
            'max' => 'El campo :attribute no puede exceder los :max caracteres.',
            'regex' => 'El campo :attribute no admite numeros.',
        ],
        'lastName' => [
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El campo :attribute solo admite caracteres.',
            'max' => 'El campo :attribute no puede exceder los :max caracteres.',
            'regex' => 'El campo :attribute no admite numeros.',
        ],
        'card' => [
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El campo :attribute solo admite caracteres.',
            'max' => 'El campo :attribute no puede exceder los :max caracteres.',
            'regex' => 'El campo :attribute solo admite numeros.',
        ],
        'email' => [
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El :attribute debe ser una cadena de texto.',
            'email' => 'El formato del :attribute es inválido.',
            'max' => 'El :attribute no debe exceder :max caracteres.',
            'unique' => 'Este :attribute ya está en uso.',
        ],
        'email_confirm' => [
            'required' => 'El campo :attribute es obligatorio.',
            'same' => 'Los correos electrónicos no coinciden.',
        ],
        'country' => [
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El :attribute debe ser una cadena de texto.',
            'max' => 'El :attribute no debe exceder :max caracteres.',
            'regex' => 'El campo :attribute no admite numeros ni espacios.',
        ],
        'state' => [
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El :attribute debe ser una cadena de texto.',
            'max' => 'El :attribute no debe exceder :max caracteres.',
            'regex' => 'El campo :attribute no admite numeros ni espacios.',
        ],
        'city' => [
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El :attribute debe ser una cadena de texto.',
            'max' => 'El :attribute no debe exceder :max caracteres.',
            'regex' => 'El campo :attribute no admite numeros ni espacios.',
        ],
        'address' => [
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El :attribute debe ser una cadena de texto.',
            'max' => 'El :attribute no debe exceder :max caracteres.',
        ],
        'address_complement' => [
            'string' => 'El :attribute debe ser una cadena de texto.',
            'max' => 'El :attribute no debe exceder :max caracteres.',
        ],
        'phoneRoot' => [
            'string' => 'El campo :attribute solo admite caracteres.',
            'min' => 'El campo :attribute debe tener mínimo :min caracteres.',
            'max' => 'El campo :attribute no puede exceder los :max caracteres.',
        ],
        'phone' => [
            'string' => 'El campo :attribute solo admite caracteres.',
            'regex' => 'El campo :attribute solo admite numeros.',
            'min' => 'El campo :attribute debe tener mínimo :min caracteres.',
            'max' => 'El campo :attribute no puede exceder los :max caracteres.',
        ],
        'password' => [
            'required' => 'El campo :attribute es obligatorio.',
            'min' => 'El campo :attribute debe tener mínimo :min caracteres.',
            'minjs' => 'Al menos 8 caracteres de longitud',
            'confirmed' => 'Las contraseñas deben coincidir.',
            'lowercase' => 'Al menos 1 letra minúscula (a...z)',
            'number' => 'Al menos 1 número (0...9)',
            'special' => 'Al menos 1 símbolo especial (!...$)',
            'uppercase' => 'Al menos 1 letra mayúscula (A...Z)',
        ],
        'password_confirmation' => [
            'required' => 'El campo de confirmación de contraseña es obligatorio.',
            'same' => 'La confirmación de contraseña no coincide con la contraseña.',
        ],
        'terms' => [
            'accepted' => 'Debes aceptar los términos y condiciones.',
            'required' => 'Es obligatorio aceptar los términos y condiciones.',
        ],

        'socialMediaData.*.url' => [
            'regex' => 'El enlace proporcionado para :attribute no es válido. Debe ser una URL correcta como example.com o www.example.com.',
            'max' => 'El enlace de :attribute no puede superar los 255 caracteres.',
        ],
        'socialMediaData.*.status' => [
            'in' => 'El estado de :attribute debe ser "added" o "edited".',
        ],
        'socialMediaData.*.terms' => [
            'boolean' => 'El valor de términos para :attribute debe ser verdadero o falso.',
        ],
        'socialMediaData.*.marketing' => [
            'boolean' => 'El valor de marketing para :attribute debe ser verdadero o falso.',
        ],
        'after_or_equal' => 'El campo :attribute debe ser una fecha posterior o igual a la fecha inicial.',

    ],
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */
    'attributes'           => [
        'name'                  => 'nombre',
        'username'              => 'usuario',
        'email'                 => 'Correo electrónico',
        'first_name'            => 'nombre',
        'firstname'             => 'Nombres',
        'lastname'              => 'Apellidos',
        'card'                  => 'C.C/T.I',
        'email_confirm'         => 'Confirmación de correo electrónico',
        'last_name'             => 'apellido',
        'password'              => 'contraseña',
        'password_confirmation' => 'confirmación de la contraseña',
        'city'                  => 'ciudad',
        'state'                 => 'Departamento',
        'country'               => 'País',
        'address'               => 'dirección',
        'phone'                 => 'teléfono',
        'mobile'                => 'celular',
        'age'                   => 'edad',
        'sex'                   => 'sexo',
        'gender'                => 'género',
        'year'                  => 'año',
        'month'                 => 'mes',
        'day'                   => 'día',
        'hour'                  => 'hora',
        'minute'                => 'minuto',
        'second'                => 'segundo',
        'title'                 => 'título',
        'body'                  => 'contenido',
        'description'           => 'Descripción',
        'excerpt'               => 'extracto',
        'date'                  => 'fecha',
        'time'                  => 'hora',
        'subject'               => 'asunto',
        'message'               => 'mensaje',
        'required'              => 'Requerido',
        'end_date'              =>  'Fecha fin',

        'socialMediaData.linkedin.url' => 'LinkedIn URL',
        'socialMediaData.linkedin.status' => 'estado de LinkedIn',
        'socialMediaData.linkedin.terms' => 'términos de LinkedIn',
        'socialMediaData.linkedin.marketing' => 'marketing de LinkedIn',

        'socialMediaData.facebook.url' => 'Facebook URL',
        'socialMediaData.facebook.status' => 'estado de Facebook',
        'socialMediaData.facebook.terms' => 'términos de Facebook',
        'socialMediaData.facebook.marketing' => 'marketing de Facebook',

        'socialMediaData.github.url' => 'GitHub URL',
        'socialMediaData.github.status' => 'estado de GitHub',
        'socialMediaData.github.terms' => 'términos de GitHub',
        'socialMediaData.github.marketing' => 'marketing de GitHub',

        'socialMediaData.office365.url' => 'Office 365 URL',
        'socialMediaData.office365.status' => 'estado de Office 365',
        'socialMediaData.office365.terms' => 'términos de Office 365',
        'socialMediaData.office365.marketing' => 'marketing de Office 365',

        'socialMediaData.youtube.url' => 'YouTube URL',
        'socialMediaData.youtube.status' => 'estado de YouTube',
        'socialMediaData.youtube.terms' => 'términos de YouTube',
        'socialMediaData.youtube.marketing' => 'marketing de YouTube',

        'socialMediaData.twitter.url' => 'Twitter URL',
        'socialMediaData.twitter.status' => 'estado de Twitter',
        'socialMediaData.twitter.terms' => 'términos de Twitter',
        'socialMediaData.twitter.marketing' => 'marketing de Twitter',

        'socialMediaData.instagram.url' => 'Instagram URL',
        'socialMediaData.instagram.status' => 'estado de Instagram',
        'socialMediaData.instagram.terms' => 'términos de Instagram',
        'socialMediaData.instagram.marketing' => 'marketing de Instagram',
    ],
];
