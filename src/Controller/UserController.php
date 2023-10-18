<?php

namespace App\Controller;

use App\Form\Type\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;

class UserController extends AbstractController
{
    public function __construct(private readonly UserRepository $repository)
    {
    }

    #[Route(path: '/', name: 'index')]
    public function indexAction(Request $request): Response
    {
        $form = $this->createForm(UserType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $this->repository->add($data);

            try {
                $this->repository->flush();
                $this->addFlash('success', 'Erfolgreich gespeichert!');
                return $this->redirectToRoute('index');
            } catch (\Exception $e) {
                $this->addFlash('error', $e->getMessage());
                return $this->redirectToRoute('index');
            }
        }

        return $this->render(
            'index.html.twig',
            [
                'UserForm' => $form,
            ]
        );
    }
}