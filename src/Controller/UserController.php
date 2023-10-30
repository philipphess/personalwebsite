<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;

class UserController extends AbstractController
{
    #[Route(path: '/showusers', name: 'showusers')]
    public function show(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAllUsers();
        return $this->render('account/show.html.twig', ['users' => $users]);
    }

    #[Route(path: '/finduser/{email}', name: 'finduser')]
    public function findUser(UserRepository $userRepository, $email): Response
    {
        $user = $userRepository->findUserByEmail($email);
    
        return $this->render('account/find.html.twig', ['users' => [$user]]);
    }
}
