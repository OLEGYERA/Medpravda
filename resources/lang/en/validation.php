<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute must be accepted.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'Поле :attribute не может быть ранее поля :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute may only contain letters.',
    'alpha_dash' => 'Поле :attribute может содержать только буквы, цифры, тире и подчеркивание.',
    'alpha_num' => 'Поле :attribute может содержать только буквы и цифры.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'Поле :attribute должно содержать числа от :min до :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'Поле :attribute должно содержать от :min до :max символов.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'Поле :attribute должно иметь значение true или false.',
    'confirmed' => 'Подтверждение пароля не совпало с полем :attribute.',
    'date' => 'Поле :attribute должно быть в формате даты.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'В поле :attribute должны быть числа от :min до :max.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'В поле :attribute должен быть реальный адрес электронной почты.',
    'exists' => 'Выбранный :attribute не корректен.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'В поле :attribute должно быть число.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'max' => [
        'numeric' => 'Поле :attribute не может содержать число больше :max.',
        'file' => 'Файл :attribute должен быть не больше :max килобайт.',
        'string' => 'Поле :attribute не может содержать более :max символов.',
        'array' => 'The :attribute may not have more than :max items.',
    ],
    'mimes' => 'Поле :attribute должно содержать файл в формате :values.',
    'mimetypes' => 'Поле :attribute должно содержать файл в формате :values.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'В поле :attribute должно содержаться не менее :min символов.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'not_in' => 'The selected :attribute is invalid.',
    'numeric' => 'Поле :attribute должно быть числовым.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'Недопустимые символы в поле :attribute .',
    'required' => 'Заполните поле :attribute.',
    'required_if' => 'Заполните поле :attribute.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values is present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'Поле :attribute должно содержать :size символов.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'string' => 'Поле :attribute должно иметь строковый формат.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => ':attribute уже используется.',
    'uploaded' => 'Ошибка загрузки :attribute.',
    'url' => 'Не правильный формат в поле :attribute.',

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
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
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

    'attributes' => [
        'start'=>'<strong>Дата старта</strong>',
    ],

];
