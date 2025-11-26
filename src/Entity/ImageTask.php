<?php

namespace App\Entity;

use App\Enum\ImageTaskOperation;
use App\Enum\Status;
use App\Repository\ImageTaskRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(ImageTaskRepository::class)]
class ImageTask
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(name: 'image_link', type: 'string')]
    private string $imageLink;
    #[ORM\Column(name: 'status', enumType: Status::class)]
    private Status $status;
    #[Orm\Column(name: 'operation', enumType: ImageTaskOperation::class)]
    private ImageTaskOperation $operation;
    /**
     * @var Collection<int, ImageTaskParam>|null
     */
    #[Orm\OneToMany(targetEntity: ImageTaskParam::class, mappedBy: 'task', orphanRemoval: true)]
    private ?Collection $params = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getImageLink(): string
    {
        return $this->imageLink;
    }

    public function setImageLink(string $imageLink): void
    {
        $this->imageLink = $imageLink;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function setStatus(Status $status): void
    {
        $this->status = $status;
    }

    public function getOperation(): ImageTaskOperation
    {
        return $this->operation;
    }

    public function setOperation(ImageTaskOperation $operation): void
    {
        $this->operation = $operation;
    }

    /**
     * @return Collection<int, ImageTaskParam>|null
     */
    public function getParams(): ?Collection
    {
        return $this->params;
    }

    /**
     * @param Collection<int, ImageTaskParam> $params
     */
    public function setParams(Collection $params): void
    {
        $this->params = $params;
    }

}