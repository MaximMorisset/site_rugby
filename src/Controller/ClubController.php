<?php

namespace App\Controller;

use App\Entity\Terrain;
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
            $terrain = new Terrain();
            $terrain->setLieu($form->get('terrains')->getData());
            $entityManager->persist($terrain);

            $club->addTerrain($terrain);
            $club->setFondateur($this->getUser());
            $entityManager->persist($club);
            $entityManager->flush();
            // do anything else you need here, like send an email
        }
        return $this->render('club/create_club.html.twig', [
            'clubForm' => $form->createView(),
        ]);
    }

    #[Route('/search/club', name: 'search_club')]
    public function search(Request $request, ClubRepository $clubRepository): Response
    {
        return $this->render('club/search.html.twig', [
            'clubs' => $clubRepository->findBy(["nom"=>$request->query->get('search')]),
        ]);
    }

    #[Route('/detail/club/{id}', name: 'detail_club')]
    public function detail(club $club): Response
    {
        return $this->render('club/detail_club.html.twig', [
            'club' => $club,
        ]);
    }
}
