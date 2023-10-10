<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JoueursController extends AbstractController
{
    #[Route('/joueurs', name: 'app_joueurs')]
    public function joueurs(): Response
    {
        return $this->render('equipe/joueurs.html.twig', [
            'controller_name' => 'JoueursController',
        ]);
    }

    #[Route('/entraineurs', name: 'app_entraineurs')]
    public function entraineurs(): Response
    {
        return $this->render('equipe/entraineurs.html.twig', [
            'controller_name' => 'EntraineursController',
        ]);
    }

    #[Route('/staff', name: 'app_staff')]
    public function staff(): Response
    {
        return $this->render('equipe/staff.html.twig', [
            'controller_name' => 'StaffController',
        ]);
    }
}
