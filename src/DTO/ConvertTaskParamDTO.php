<?php

namespace App\DTO;

use App\DTO\Interface\CommandTaskParamDTO;
use Symfony\Component\Validator\Constraints as Assert;

class ConvertTaskParamDTO implements CommandTaskParamDTO
{
    public function __construct(
        #[Assert\NotNull()]
        #[Assert\Choice(['png', 'jpg', 'webp', 'jpeg'])]
        private string $format
    )
    {
    }

    public function getFormat(): string
    {
        return $this->format;
    }

    public function toArray(): array
    {
        return [
            'format' => $this->format,
        ];
    }
}