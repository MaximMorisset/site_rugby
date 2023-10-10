<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EntraineursController extends AbstractController
{
    #[Route('/entraineurs', name: 'app_entraineurs')]
    public function index(): Response
    {
        return $this->render('entraineurs/entraineurs.html.twig', [
            'controller_name' => 'EntraineursController',
        ]);
    }
}
