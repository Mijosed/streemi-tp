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
        return $this->render(view: 'admin/admin_movies.html.twig');
    }

    #[Route(path:'/admin/users', name: 'page_admin_users')]
    public function users(): Response
    {
        return $this->render(view: 'admin/admin_users.html.twig');
    }

    #[Route(path: '/admin/movies/add', name: 'page_admin_movies_add')]
    public function addMovies(): Response
    {
        return $this->render(view: 'admin/admin_add_films.html.twig');
    }

    #[Route(path:'/admin/settings', name: 'page_admin_settings')]
    public function settings(): Response
    {
        return $this->render(view: 'admin/admin_settings.html.twig');
    }


}