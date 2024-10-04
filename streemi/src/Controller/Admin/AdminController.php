<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    #[Route(path:'/admin', name: 'page_admin')]
    public function admin(): Response
    {
        return $this->render(view: 'admin/admin.html.twig');
    }

    #[Route(path:'/admin/movies', name: 'page_admin_movies')]
    public function movies(): Response
    {
        return $this->render(view: 'admin/movies.html.twig');
    }

    #[Route(path:'/admin/users', name: 'page_admin_users')]
    public function users(): Response
    {
        return $this->render(view: 'admin/users.html.twig');
    }

    #[Route(path:'/admin/settings', name: 'page_admin_settings')]
    public function settings(): Response
    {
        return $this->render(view: 'admin/settings.html.twig');
    }


}