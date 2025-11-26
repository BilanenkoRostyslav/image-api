<?php

namespace App\Repository;

use App\Entity\ImageTaskParam;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\LockMode;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ImageTaskParam>
 */
class ImageTaskParamRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImageTaskParam::class);
    }

    public function persist(ImageTaskParam $imageTaskParam): void
    {
        $this->getEntityManager()->persist($imageTaskParam);
    }

    public function flush(): void
    {
        $this->getEntityManager()->flush();
    }

    public function persistMany(ImageTaskParam ...$imageTaskParams): void
    {
        foreach ($imageTaskParams as $imageTaskParam) {
            $this->persist($imageTaskParam);
        }
    }
}