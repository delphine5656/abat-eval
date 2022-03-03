<?php

namespace App\Controller\Admin;

use App\Entity\Agent;
use App\Entity\Category;
use App\Entity\Cible;
use App\Entity\Contact;
use App\Entity\Mission;
use App\Entity\Nationality;
use App\Entity\Pays;
use App\Entity\Planque;
use App\Entity\Speciality;
use App\Entity\Statut;
use App\Entity\TypePlanque;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Filter\BooleanFilter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Abat');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Type de mission', 'fas fa-list', Category::class);
        yield MenuItem::linkToCrud('Mission', 'fas fa-tag', Mission::class);
        yield MenuItem::linkToCrud('Agent', 'fa fa-user-secret', Agent::class);
        yield MenuItem::linkToCrud('Cible', 'fa fa-podcast', Cible::class);
        yield MenuItem::linkToCrud('Contact', 'fa fa-user-circle', Contact::class);
        yield MenuItem::linkToCrud('Nationalite', 'fas fa-tag', Nationality::class);
        yield MenuItem::linkToCrud('Pays', 'fa fa-globe', Pays::class);
        yield MenuItem::linkToCrud('Planque', 'fa fa-eye-slash', Planque::class);
        yield MenuItem::linkToCrud('Specialite', 'fa fa-id-badge', Speciality::class);
        yield MenuItem::linkToCrud('Statut', 'fa fa-calendar', Statut::class);
        yield MenuItem::linkToCrud('TypePlanque', 'fa fa-university', TypePlanque::class);
    }
    public function configureCrud(): Crud
    {
        return Crud::new()
            // this defines the pagination size for all CRUD controllers
            // (each CRUD controller can override this value if needed)
            ->setPaginatorPageSize(20)
            ;
    }


}
