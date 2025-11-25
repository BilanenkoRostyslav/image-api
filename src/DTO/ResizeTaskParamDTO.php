<?php

namespace App\DTO;

use App\DTO\Interface\CommandTaskParamDTO;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;

class ResizeTaskParamDTO implements CommandTaskParamDTO
{
    public function __construct(
        #[GreaterThanOrEqual(value: 10)]
        private int $width,
        #[GreaterThanOrEqual(value: 10)]
        private int $height,
    )
    {
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function toArray(): array
    {
        return [
            'width' => $this->width,
            'height' => $this->height,
        ];
    }
}