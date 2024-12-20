<?php

declare(strict_types=1);

namespace App\Controller\Movie;

use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Category;

class CategoryController extends AbstractController
{
    #[Route(path:'/categories/{id}', name: 'page_detail_category')]
    public function detail(
        Category $category
    ): Response
    {
        return $this->render('movie/category.html.twig', ['category' => $category]);
    }

    #[Route(path:'/discover', name: 'page_discover')]
    public function discover(
        CategoryRepository $categoryRepository
    ): Response
    {
        $categories = $categoryRepository->findAll();

        return $this->render('movie/discover.html.twig', ['categories' => $categories]);
    }
}
