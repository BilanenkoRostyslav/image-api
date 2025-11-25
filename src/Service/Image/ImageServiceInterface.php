<?php

namespace App\Service\Image;

use App\DTO\ImageDTO;

interface ImageServiceInterface
{
    public function uploadImage(ImageDTO $imageDTO): string;
}