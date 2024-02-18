<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

use Discogs\DiscogsClient;

class DiscogsController extends AbstractController
{

    #[Route('/search/{name}/{style}/{genre}', name: 'search')]
    public function search_with_filter(DiscogsClient $discogs, $name, $style, $genre)
    {
        $searchParams = ['q' => $name];
    
        if ($style != "Aucun") {
            $searchParams['style'] = $style;
        }
    
        if ($genre != "Aucun") {
            $searchParams['genre'] = $genre;
        }
    
        $artist = $discogs->search($searchParams);
    
        $img = [];
        $title = [];
        $id = [];
        $type = [];
        foreach ($artist['results'] as $result) {
            $title[] = $result['title'];
            $img[] = $result['cover_image'];
            $id[] = $result['id'];
            $type[] = $result['type'];
        }
    
        return $this->render('discogs/index.html.twig', [
            'title' => $title,
            'img' => $img,
            'id' => $id,
            'type' => $type
        ]);
    }
    
}