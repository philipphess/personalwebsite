<?php

namespace App\Repository;

use App\Entity\ContactEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ContactRepository extends ServiceEntityRepository
{
    public function __construct(private readonly ManagerRegistry $registry)
    {
        parent::__construct($this->registry, ContactEntity::class);
    }
    public function add(ContactEntity $contactEntity): void
    {
        $manager = $this->getEntityManager();
        $manager->persist($contactEntity);
    }
    public function flush(): void
    {
        $this->getEntityManager()->flush();
    }
}