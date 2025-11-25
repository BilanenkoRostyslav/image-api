<?php

namespace App\Service\Image;

use App\DTO\ImageDTO;

class DirectoryImageService implements ImageServiceInterface
{
    public function __construct(
        private readonly string $path,
        private readonly string $appUrl,
    )
    {
    }

    public function uploadImage(ImageDTO $imageDTO): string
    {
        $image = $imageDTO->getImage();
        $fileName = uniqid() . '.' . $image->guessExtension();
        $image->move($this->path, $fileName);

        return $this->appUrl . '/uploads/' . $fileName;
    }
}