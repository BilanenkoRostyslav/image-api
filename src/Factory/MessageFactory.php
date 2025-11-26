<?php

namespace App\Factory;

use App\Enum\ImageTaskOperation;
use App\Message\ImageTaskMessage;

class MessageFactory
{
    /**
     * @param array<string, string|int> $params
     */
    public function create(string $imageUrl, ImageTaskOperation $taskOperation, array $params): ImageTaskMessage
    {
        return new ImageTaskMessage(
            imageUrl: $imageUrl,
            operation: $taskOperation->value,
            params: $params,
        );
    }
}