<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

use Discogs\DiscogsClient;

class AlbumController extends AbstractController
{
    #[Route('/album/{type}/{id}', name: 'album_read')]
    public function read(Request $request,DiscogsClient $discogs,$id,$type): Response
    {
        if($type =="release"){
            $album = $discogs->getRelease(['id' => $id,]);
        } else {
            $album = $discogs->getMaster(['id' => $id,]);
        }

        $duration = [];
        $title = [];
        foreach ($album['tracklist'] as $track) {            
            $title [] = $track['title'];
            $duration[] = $track['duration'];
        }

        return $this->render('album/read.html.twig', [
            'album' => $album,
            'type' => $type,
            'duration'=> $duration,
            'title'=>$title
        ]);
    }
}
