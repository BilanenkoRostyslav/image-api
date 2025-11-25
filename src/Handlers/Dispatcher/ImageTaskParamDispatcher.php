<?php

namespace App\Handlers\Dispatcher;

use App\DTO\ConvertTaskParamDTO;
use App\DTO\Interface\CommandTaskParamDTO;
use App\DTO\ResizeTaskParamDTO;
use App\Entity\ImageTask;
use App\Handlers\TaskParamHandler\ConvertTaskHandler;
use App\Handlers\TaskParamHandler\ResizeTaskHandler;

class ImageTaskParamDispatcher
{
    public function __construct(
        private readonly ConvertTaskHandler $convertTaskHandler,
        private readonly ResizeTaskHandler  $resizeTaskHandler,
    )
    {
    }

    public function dispatch(CommandTaskParamDTO $dto, ImageTask $task): void
    {
        match ($dto::class) {
            ConvertTaskParamDTO::class => $this->convertTaskHandler->handle($dto, $task),
            ResizeTaskParamDTO::class => $this->resizeTaskHandler->handle($dto, $task),
        };
    }
}