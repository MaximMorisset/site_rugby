<?php

namespace App\Controller;

use App\Entity\Club;
use App\Form\ClubType;
use App\Repository\ClubRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ClubController extends AbstractController
{
    #[Route('/club', name: 'app_club')]
    public function index(ClubRepository $clubRepository): Response
    {
        $clubs = $clubRepository->findAll();

        return $this->render('club/club.html.twig', [
            'clubs' => $clubs,
            'controller_name' => 'ClubController',
        ]);
    }
    
    #[Route('/add/club', name: 'app_create_club')]
    public function createClub(Request $request, EntityManagerInterface $entityManager): Response
    {
        $club = new Club();
        $form = $this->createForm(ClubType::class, $club);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($club);
            $entityManager->flush();
            // do anything else you need here, like send an email
        }
        return $this->render('club/create_club.html.twig', [
            'clubForm' => $form->createView(),
        ]);
    }
}
