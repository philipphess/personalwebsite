<?php

namespace App\Repository;

use App\Entity\LoginEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Doctrine\Persistence\ManagerRegistry;

class LoginRepository extends ServiceEntityRepository
{
    public function __construct(private readonly ManagerRegistry $registry)
    {
        parent::__construct($this->registry, LoginEntity::class);
    }
    public function verifyUser(LoginEntity $loginEntity): void
    {

        dd($loginEntity);
        $user = $this->entityManager->getRepository(LoginEntity::class)->find($loginEntity->getId());
    
        if (!$user) {
            throw new AuthenticationException('Benutzer nicht gefunden!');
        }

        if ($this->passwordEncoder->isPasswordValid($user, $loginEntity->getPassWord())) {

        } else {
            throw new AuthenticationException('Ungültiges Passwort!');
        }
    }
}