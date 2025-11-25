<?php

namespace App\Factory;

use App\Service\Image\DirectoryImageService;
use App\Service\Image\ImageServiceInterface;
use App\Service\Image\S3ImageService;

class ImageServiceFactory
{
    public function __construct(
        private readonly ?string               $key,
        private readonly DirectoryImageService $directoryImageService,
        private readonly S3ImageService        $s3ImageService,
    )
    {
    }

    public function create(): ImageServiceInterface
    {
        if ($this->key == '') {
            return $this->directoryImageService;
        }
        return $this->s3ImageService;
    }
}