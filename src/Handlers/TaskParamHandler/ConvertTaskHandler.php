<?php

namespace App\Handlers\TaskParamHandler;

use App\DTO\ConvertTaskParamDTO;
use App\Entity\ImageTask;
use App\Entity\ImageTaskParam;

class ConvertTaskHandler extends AbstractTaskParamHandler
{

    public function handle(ConvertTaskParamDTO $dto, ImageTask $imageTask): void
    {
        $taskParam = $this->factory->create('format', $dto->getFormat(), $imageTask);
        $this->repository->persist($taskParam);
        $this->repository->flush();
    }
}