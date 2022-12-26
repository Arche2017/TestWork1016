<?php

namespace App\Exceptions;

use Exception;

class UserNotFoundException extends Exception
{
    public function render($request)
    { 
        return response('Пользователь не найден!');
    }
}
