<?php

namespace App\Service;

use App\DTO\ImageTaskDTO;
use App\DTO\Interface\CommandTaskParamDTO;
use App\Enum\ImageTaskOperation;
use App\Factory\ImageTaskFactory;
use App\Factory\MessageFactory;
use App\Handlers\Dispatcher\ImageTaskParamDispatcher;
use App\Repository\ImageTaskRepository;
use Symfony\Component\Messenger\Exception\ExceptionInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class TaskService
{
    public function __construct(
        private readonly ImageTaskRepository      $imageTaskRepository,
        private readonly ImageTaskFactory         $factory,
        private readonly ImageTaskParamDispatcher $taskParamDispatcher,
        private readonly MessageBusInterface      $messageBus,
        private readonly MessageFactory           $messageFactory,
    )
    {
    }

    /**
     * @throws ExceptionInterface
     */
    public function createTask(ImageTaskOperation $operation, string $imageUrl, CommandTaskParamDTO $dto): ImageTaskDTO
    {
        $task = $this->factory->create($operation, $imageUrl);
        $this->imageTaskRepository->persist($task);
        $this->imageTaskRepository->flush();

        $this->taskParamDispatcher->dispatch($dto, $task);

        $message = $this->messageFactory->create($task->getImageLink(), $task->getOperation(), $dto->toArray());
        $this->messageBus->dispatch($message);
        return new ImageTaskDTO($task->getId());
    }
}