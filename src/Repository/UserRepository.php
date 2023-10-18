<?php

namespace App\Repository;

use App\Entity\UserEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UserRepository extends ServiceEntityRepository
{
    public function __construct(private readonly ManagerRegistry $registry)
    {
        parent::__construct($this->registry, UserEntity::class);
    }

    public function add(UserEntity $UserEntity): void
    {
        $manager = $this->getEntityManager();
        $manager->persist($UserEntity);
    }

    public function flush(): void
    {
        $this->getEntityManager()->flush();
    }
}
