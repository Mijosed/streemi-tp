<?php

declare(strict_types=1);

namespace App\Controller\Movie;

use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{
    #[Route(path:'/category/{id}', name: 'page_detail_category')]
    public function detail(
        string $id,
        CategoryRepository $categoryRepository
    ): Response
    {
        $category = $categoryRepository->find($id);

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
