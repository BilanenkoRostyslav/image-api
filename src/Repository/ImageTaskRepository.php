<?php

namespace App\Repository;

use App\Entity\ImageTask;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\LockMode;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ImageTask|null find(mixed $id, LockMode|int|null $lockMode = null, int|null $lockVersion = null)
 * @method ImageTask[] findAll()
 * @method ImageTask[] findBy(array $criteria, array|null $orderBy = null, int|null $limit = null, int|null $offset = null)
 * @method ImageTask|null findOneBy(array $criteria, array|null $orderBy = null)
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