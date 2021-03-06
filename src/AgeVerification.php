<?php

namespace Slashplus\Identity;

use Slashplus\Identity\Contracts\Validation\Validator;
use Slashplus\Identity\Exceptions\ClassNotFoundException;

class AgeVerification
{
    public static function create(array $data, string $validator = 'id_card', $lang = 'en')
    {
        $className = \Illuminate\Support\Str::studly($validator);
        $class = '\\'.__NAMESPACE__.'\\Validation\\'.$className.'Validation\\Validator';
        if (class_exists($class) && class_implements(Validator::class)) {
            return new $class($data, $lang);
        }

        throw new ClassNotFoundException("There is no Validation class with name '{$class}'", $class);
    }
}
