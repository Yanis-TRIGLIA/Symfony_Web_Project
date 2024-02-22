<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Service\ExternalApiService;

class ArtistsController extends AbstractController
{
    #[Route('/artists/{id}', name: 'artists_read')]
    public function read(Request $request,ExternalApiService $externalApiService,$id): Response
    {
        $artist = $externalApiService->getArtistDataById($id);

        return $this->render('artists/read.html.twig', ['artist' => $artist]);
    }
}
