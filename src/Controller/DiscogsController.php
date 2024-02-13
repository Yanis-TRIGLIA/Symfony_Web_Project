<?php

namespace App\Controller;

use App\Entity\Artists;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

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
        $id = [];
        foreach ($artist['results'] as $result) {
            $title[] = $result['title'];
            $img[] = $result['cover_image'];
            $id[] = $result['id'];
        }

        return $this->render('discogs/index.html.twig', [
            'title' => $title,
            'img' => $img,
            'id' => $id
        ]);
    }

    #[Route('/album/{id}', name: 'app_album')]
    public function music_information(Request $request,DiscogsClient $discogs,$id)
    {
        
        $album = $discogs->getRelease([
            'id' => $id,
        ]);
     
        var_dump($album);

        return $this->render('discogs/album.html.twig', [
            'album' => $album,
        ]);

    }


}