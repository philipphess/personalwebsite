<?php

namespace App\Controller;

use App\Form\Type\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ContactRepository;

class IndexController extends AbstractController
{
    public function __construct(private readonly ContactRepository $repository)
    {
    }
    #[Route(path: '/', name: 'index')]
    public function indexAction(Request $request): Response
    {
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $this->repository->add($data);
            $this->repository->flush();
            $this->addFlash('SUCCESS', 'Erfolgreich gespeichert!');
            return $this->redirectToRoute('index');
        }

        return $this->render(
            'index.html.twig',
            [
                'contactForm' => $form
            ]
        );
    }
}