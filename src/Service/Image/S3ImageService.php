<?php

namespace App\Service\Image;

use App\DTO\ImageDTO;
use Aws\S3\S3Client;

class S3ImageService implements ImageServiceInterface
{
    public function __construct(
        private readonly S3Client $s3,
        private readonly string   $bucket,
        private readonly string   $path,
    )
    {

    }

    public function uploadImage(ImageDTO $imageDTO): string
    {
        $image = $imageDTO->getImage();
        $result = $this->s3->putObject([
            'Bucket' => $this->bucket,
            'Key' => $this->path . uniqid() . '.' . $image->guessExtension(),
            'SourceFile' => $image->getPathname(),
        ]);

        return $result['ObjectURL'];
    }
}