<?php

namespace App\Handlers\TaskParamHandler;

use App\DTO\ResizeTaskParamDTO;
use App\Entity\ImageTask;
use App\Entity\ImageTaskParam;

class ResizeTaskHandler extends AbstractTaskParamHandler
{
    /**
     * @param ResizeTaskParamDTO $dto
     * @param ImageTask $imageTask
     */
    public function handle(ResizeTaskParamDTO $dto, ImageTask $imageTask): void
    {
        $widthParam = $this->factory->create('width', $dto->getWidth(), $imageTask);
        $heightParam = $this->factory->create('height', $dto->getHeight(), $imageTask);
        $this->repository->persistMany($widthParam, $heightParam);
        $this->repository->flush();
    }
}