<?php

declare(strict_types=1);

namespace App\Controller\Other;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UploadController extends AbstractController
{
    #[Route(path:'/upload', name: 'page_upload')]
    public function upload(): Response
    {
        return $this->render(view: 'upload/upload.html.twig');
    }
}