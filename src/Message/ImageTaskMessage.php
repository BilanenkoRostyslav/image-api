<?php

namespace App\Message;

use App\Enum\ImageTaskOperation;

class ImageTaskMessage
{
    public function __construct(
        public string $imageUrl,
        public string $operation,
        public array  $params,
    )
    {
    }
}