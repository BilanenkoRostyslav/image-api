<?php

namespace App\Exception;

use Exception;
use RuntimeException;

class RequestBodyConvertException extends RuntimeException
{

    public function __construct(?Exception $previous = null)
    {
        parent::__construct('Error while unmarshalling request body', 500, $previous);
    }
}