<?php

namespace App\Controller;

use App\Form\Type\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\LoginRepository;

class LoginController extends AbstractController
{
    public function __construct(private readonly LoginRepository $repository)
    {
    }
    #[Route(path: '/login', name: 'login')]
    public function loginAction(Request $request): Response
    {
        $form = $this->createForm(LoginType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            dd($data);
            try {
                $this->repository->verifyUser($data);
                return $this->redirectToRoute('index'); //TODO redirect to account interface
            } catch (\Exception $e) {
                $this->addFlash('FAILTURE', $e->getMessage());
                return $this->redirectToRoute('login');
            }
        }

        return $this->render(
            'security/login.html.twig',
            [
                'loginForm' => $form
            ]
        );
    }
}