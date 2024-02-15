<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

use Discogs\DiscogsClient;

class ArtistsController extends AbstractController
{
    #[Route('/artists/{id}', name: 'artists_read')]
    public function read(Request $request,DiscogsClient $discogs,$id): Response
    {
        $artist = $discogs->getArtist(['id' => $id,]);

        return $this->render('artists/read.html.twig', ['artist' => $artist]);
    }
}
