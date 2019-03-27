<?php

/** @var \Illuminate\Validation\Factory $validator */

$validator->extend(
    'valid_password',
    function ($attribute, $value, $parameters)
    {
        return preg_match('/^[a-zA-Z0-9!@#$%\/\^&\*\(\)\-_\+\=\|\[\]{}\\\\?\.,<>`\'":;]+$/u', $value);
    }
);

$validator->extend(
    'phone_number',
    function ($attribute, $value, $parameters)
    {
        return strlen( $value) == 4;
    },"$attribute atleast 4 digit in length"
);

$validator->extend(
    'number_length',
    function ($attribute, $value, $parameters)
    {
        return strlen(preg_replace('#^.*([0-9]{3})[^0-9]*([0-9]{3})[^0-9]*([0-9]{4})$#', '$1$2$3', $value)) == 10;
    }
);