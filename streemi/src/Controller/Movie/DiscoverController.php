<?php

namespace App\Controller\Movie;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DiscoverController extends AbstractController
{

    #[Route(path:'/discover', name: 'page_discover')]
    public function discover(): Response
    {
        return $this->render(view: 'movie/discover.html.twig');
    }
}
