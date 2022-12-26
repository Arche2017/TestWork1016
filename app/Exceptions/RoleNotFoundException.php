<?php

namespace App\Exceptions;

use Exception;

class RoleNotFoundException extends Exception
{
    public function render($request)
    { 
        return response('Роль не найдена!');
    }
}
