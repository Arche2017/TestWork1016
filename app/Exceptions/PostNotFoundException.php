<?php

namespace App\Exceptions;

use Exception;

class PostNotFoundException extends Exception
{
    public function render($request)
    { 
        return response('Пост не найден!');
    }
}
