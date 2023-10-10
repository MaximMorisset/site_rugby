<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddClubController extends AbstractController
{
    #[Route('/add/club', name: 'app_add_club')]
    public function index(): Response
    {
        return $this->render('add_club/add_club.html.twig', [
            'controller_name' => 'AddClubController',
        ]);
    }
}
