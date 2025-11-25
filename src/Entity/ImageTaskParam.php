<?php

namespace App\Entity;

use App\Repository\ImageTaskParamRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImageTaskParamRepository::class)]
class ImageTaskParam
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;
    #[ORM\Column(type: 'string', length: 255)]
    private string $value;
    #[Orm\ManyToOne(targetEntity: ImageTask::class, inversedBy: 'task_params')]
    #[Orm\JoinColumn(nullable: false)]
    private ImageTask $task;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    public function getTask(): ImageTask
    {
        return $this->task;
    }

    public function setTask(ImageTask $task): void
    {
        $this->task = $task;
    }
}