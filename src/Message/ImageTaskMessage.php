<?php

namespace App\Message;

use App\Enum\ImageTaskOperation;

class ImageTaskMessage
{
    /**
     * @param string $imageUrl
     * @param string $operation
     * @param array<string, string|int> $params
     */
    public function __construct(
        public string $imageUrl,
        public string $operation,
        public array  $params,
    )
    {
    }
}