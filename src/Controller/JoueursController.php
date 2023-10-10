<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JoueursController extends AbstractController
{
    #[Route('/joueurs', name: 'app_joueurs')]
    public function index(): Response
    {
        return $this->render('joueurs/joueurs.html.twig', [
            'controller_name' => 'JoueursController',
        ]);
    }
}
