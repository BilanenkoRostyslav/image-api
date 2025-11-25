<?php

namespace App\DTO;

use App\Enum\ImageTaskOperation;
use App\Enum\Status;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

class TaskDTO
{
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Choice(choices: ['resize', 'thumbnail', 'convert'])]
        private string $operation,
    )
    {
    }

    public function getOperation(): string
    {
        return $this->operation;
    }
}