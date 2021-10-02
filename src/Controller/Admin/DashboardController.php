<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use App\Entity\Category;
use App\Entity\Image;
use App\Entity\Service;
use App\Entity\OpeningHours;
use App\Entity\Information;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;



/**
 * @IsGranted("ROLE_ADMIN")
 */
class DashboardController extends AbstractDashboardController
{
    /**
     * 
     * @Route("/adminWebsitelAtelierRouen76", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('L\'Atelier Barbershop Rouen');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Aide', 'fas fa-question');
        yield MenuItem::linkToCrud('Image', 'fa fa-image', Image::class);
        yield MenuItem::linkToCrud('Prestation', 'fa fa-scissors', Service::class);
        yield MenuItem::linkToCrud('Horaires', 'far fa-clock', OpeningHours::class);
        yield MenuItem::linkToCrud('Coordonnées', 'fas fa-info', Information::class);
        yield MenuItem::linkToCrud('Comptes Utilisateurs', 'fas fa-user-lock', Admin::class)->setPermission('ROLE_SUPER_ADMIN');
        yield MenuItem::linkToCrud('Catégorie', 'far fa-list-alt', Category::class)->setPermission('ROLE_SUPER_ADMIN');;



    }

    
}
