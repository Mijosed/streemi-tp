<?php

declare(strict_types=1);

namespace App\Controller\Movie;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{
    #[Route(path:'/category', name: 'page_detail_category')]
    public function detail(): Response
    {
        return $this->render(view: 'movie/category.html.twig');
    }
}