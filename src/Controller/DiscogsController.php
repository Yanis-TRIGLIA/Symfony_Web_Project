<?php

namespace App\Controller;

use App\Entity\Artists;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Discogs\DiscogsClient;

class DiscogsController extends AbstractController
{
    #[Route('/search/{name}', name: 'search')]
    public function index(DiscogsClient $discogs,$name)
    {
        $artist = $discogs->search([
            'q' => $name,
        ]);
        

        $img = [];
        $title = [];
        foreach ($artist['results'] as $result) {
            $title[] = $result['title'];
            $img[] = $result['cover_image'];
        }

        return $this->render('discogs/index.html.twig', [
            'title' => $title,
            'img' => $img
        ]);
    }
}