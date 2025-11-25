<?php

namespace App\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_PARAMETER)]
class RequestImageBody
{
    public function __construct(
        private readonly string $filaName,
    )
    {
    }

    public function getFilaName(): string
    {
        return $this->filaName;
    }
}