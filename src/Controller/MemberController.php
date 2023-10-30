<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MemberController extends AbstractController
{
    #[Route(path: '/member', name: 'member')]
    public function indexAction(): Response
    {
        return $this->render('account/member.html.twig');
    }

}