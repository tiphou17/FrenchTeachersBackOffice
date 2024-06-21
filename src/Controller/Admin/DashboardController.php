<?php

namespace App\Controller\Admin;

use App\Entity\Content;
use App\Entity\Language;
use App\Entity\LessonType;
use App\Entity\Order;
use App\Entity\Package;
use App\Entity\Product;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    ) {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        $url = $this->adminUrlGenerator
            ->setController(TeacherCrudController::class)
            ->generateUrl();

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
            ->setTitle('FrenchTeachersBack');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Teachers', 'fa fa-graduation-cap');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Langues', 'fas fa-globe', Language::class);
        yield MenuItem::linkToCrud('Type de leçon', 'fas fa-folder', LessonType::class);
        yield MenuItem::linkToCrud('Packages', 'fas fa-cubes', Package::class);
        yield MenuItem::linkToCrud('Produits', 'fas fa-tags', Product::class);
        yield MenuItem::linkToCrud('Commandes', 'fas fa-receipt', Order::class);
        yield MenuItem::linkToCrud('Contenu', 'fas fa-bookmark', Content::class);

    }
}
