<?php

namespace App\Repository;

use App\Entity\ImageTask;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\LockMode;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ImageTask>
 */
class ImageTaskRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImageTask::class);
    }

    public function persist(ImageTask $imageTask): void
    {
        $this->getEntityManager()->persist($imageTask);
    }

    public function flush(): void
    {
        $this->getEntityManager()->flush();
    }
}