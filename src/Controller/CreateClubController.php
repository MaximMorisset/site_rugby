<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateClubController extends AbstractController
{
    #[Route('/create/club', name: 'app_create_club')]
    public function index(): Response
    {
        return $this->render('create_club/create_club.html.twig', [
            'controller_name' => 'CreateClubController',
        ]);
    }
}
