<?php

namespace App\DTO;

class ImageTaskDTO
{
    public function __construct(
        private int $taskId
    )
    {
    }

    public function getTaskId(): int
    {
        return $this->taskId;
    }

    public function setTaskId(int $taskId): void
    {
        $this->taskId = $taskId;
    }
}