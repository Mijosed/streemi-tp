<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\MediaRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route(path:'/', name: 'page_home')]
    public function home(MediaRepository $mediaRepository
    ): Response
    {
        $medias = $mediaRepository->findAll();

        return $this->render( 'index.html.twig', ['medias' => $medias]);
    }
}   