<?php

namespace App\Controller\Admin;

use App\Entity\Club;
use App\Entity\Matchs;
use App\Entity\Poste;
use App\Entity\Entrainement;
use App\Entity\Equipe;
use App\Entity\EquipeMatch;
use App\Entity\Equipement;
use App\Entity\Stats;
use App\Entity\Terrain;
use App\Entity\Utilisateurs;
use Doctrine\ORM\Query\Expr\Math;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(PosteCrudController::class)->generateUrl();
        

        return $this->redirect($url);

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //  
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('App');
    }

    public function configureMenuItems(): iterable
    {
        // yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::linktoRoute('Back to the website', 'fas fa-home', 'homepage');
        yield MenuItem::linkToCrud('Poste', 'fas fa-map-marker-alt', Poste::class);
        yield MenuItem::linkToCrud('Club', 'fas fa-map-marker-alt', Club::class);
        yield MenuItem::linkToCrud('Matchs', 'fas fa-map-marker-alt', Matchs::class);
        yield MenuItem::linkToCrud('Entrainement', 'fas fa-map-marker-alt', Entrainement::class);
        yield MenuItem::linkToCrud('Equipe', 'fas fa-map-marker-alt', Equipe::class);
        yield MenuItem::linkToCrud('EquipeMatch', 'fas fa-map-marker-alt', EquipeMatch::class);
        yield MenuItem::linkToCrud('Stats', 'fas fa-map-marker-alt', Stats::class);
        yield MenuItem::linkToCrud('Terrain', 'fas fa-map-marker-alt', Terrain::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-map-marker-alt', Utilisateurs::class);
    }
}
