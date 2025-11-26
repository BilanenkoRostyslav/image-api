<?php

namespace App\Factory;

use App\Entity\ImageTask;
use App\Enum\ImageTaskOperation;
use App\Enum\Status;

class ImageTaskFactory
{
    public function create(ImageTaskOperation $operation, string $imageUrl): ImageTask
    {
        $task = new ImageTask();
        $task->setOperation($operation);
        $task->setImageLink($imageUrl);
        $task->setStatus(Status::CREATED);

        return $task;
    }
}