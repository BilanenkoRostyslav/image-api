<?php

namespace App\Repository;

use App\Entity\ImageTaskParam;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\LockMode;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ImageTaskParam|null find(mixed $id, LockMode|int|null $lockMode = null, int|null $lockVersion = null)
 * @method ImageTaskParam[] findBy(array $criteria, array|null $orderBy = null, int|null $limit = null, int|null $offset = null)
 * @method ImageTaskParam[] findAll()
 * @method ImageTaskParam|null findOneBy(array $criteria, array|null $orderBy = null)
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