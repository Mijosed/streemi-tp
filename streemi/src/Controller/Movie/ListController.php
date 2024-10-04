<?php

declare(strict_types=1);        

namespace App\Controller\Movie;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ListController extends AbstractController
{
    #[Route(path:'/lists', name: 'page_lists')]
    public function movies(): Response
    {
        return $this->render(view: 'movie/lists.html.twig');
    }
}