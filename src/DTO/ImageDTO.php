<?php

namespace App\DTO;


use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageDTO
{
    public function __construct(
        private UploadedFile $image,
    )
    {
    }

    public function getImage(): UploadedFile
    {
        return $this->image;
    }

    public function setImage(UploadedFile $image): void
    {
        $this->image = $image;
    }
}