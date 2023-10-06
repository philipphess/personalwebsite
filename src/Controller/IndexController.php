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
        $contactForm = $this->createForm(ContactType::class);

        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $data = $contactForm->getData();
            $this->repository->add($data);
            $this->repository->flush();
            $this->addFlash('success', 'Erfolgreich gespeichert!');
            return $this->redirectToRoute('index');
        }

        return $this->render(
            'index.html.twig',
            [
                'contactForm' => $contactForm
            ]
        );
    }
}