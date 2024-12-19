<?php

declare(strict_types=1);

namespace App\Controller\Movie;

use App\Entity\Media;
use App\Repository\MediaRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MovieController extends AbstractController
{
    #[Route(path:'/movie/{id}', name: 'page_detail_movie')]
    public function detail(
        Media $medias
    ): Response
    {
        return $this->render('movie/detail.html.twig', ['medias' => $medias]);
    }
    
    //serie

    #[Route(path:'/serie', name: 'page_detail_serie')]
    public function detailSerie(): Response
    {
        return $this->render(view: 'movie/detail_serie.html.twig');
    }

}

