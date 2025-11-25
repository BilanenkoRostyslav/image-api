<?php

namespace App\Factory;

use App\Entity\ImageTask;
use App\Entity\ImageTaskParam;

class ImageTaskParamFactory
{
    public function create(string $name, string $value, ImageTask $task): ImageTaskParam
    {
        $param = new ImageTaskParam();
        $param->setTask($task);
        $param->setName($name);
        $param->setValue($value);

        return $param;
    }
}