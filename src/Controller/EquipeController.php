<?php

namespace App\Controller;

use App\Entity\Utilisateurs;
use App\Repository\UtilisateursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EquipeController extends AbstractController
{
    #[Route('/joueurs', name: 'app_joueurs')]
    public function joueurs(UtilisateursRepository $utilisateursRepository): Response
    {
        $utilisateurs = $utilisateursRepository->findUsers('ROLE_JOUEUR');

        return $this->render('equipe/joueurs.html.twig', [
            'joueurs' => $utilisateurs,
            'controller_name' => 'EquipeController',
        ]);
    }


    #[Route('/entraineurs', name: 'app_entraineurs')]
    public function entraineurs(UtilisateursRepository $utilisateursRepository): Response
    {
        $utilisateurs = $utilisateursRepository->findUsers('ROLE_ENTRAINEUR');

        return $this->render('equipe/entraineurs.html.twig', [
            'entraineurs' => $utilisateurs,
            'controller_name' => 'EquipeController',
        ]);
    }

    #[Route('/staff', name: 'app_staff')]
    public function staff(UtilisateursRepository $utilisateursRepository): Response
    {
        $utilisateurs = $utilisateursRepository->findUsers('ROLE_STAFF');

        return $this->render('equipe/staff.html.twig', [
            'staffs' => $utilisateurs,
            'controller_name' => 'EquipeController',
        ]);
    }
}