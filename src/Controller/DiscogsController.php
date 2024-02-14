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

    #[Route('/album/{id}/{type}', name: 'app_album')]
    public function music_information(Request $request,DiscogsClient $discogs,$id,$type)
    {

        /// for release
        if($type =="release"){
            $part = $discogs->getRelease([
            'id' => $id,
        ]);

        $title = []; 
        $duration = [];
        foreach ($part['tracklist'] as $track) {
            $title [] = $track['title'];
            $duration[] = $track['duration'];
        }
        

        return $this->render('discogs/album.html.twig', [
            'part' => $part,
            'type' => $type,
            'duration'=> $duration,
            'title'=>$title
        ]);
        
        }

        /// for master
        if($type =="master"){
            $album = $discogs->getMaster([
            'id' => $id,
        ]);

        $duration = [];
        $title = [];
        foreach ($album['tracklist'] as $track) {            
            $title [] = $track['title'];
            $duration[] = $track['duration'];
        }

        return $this->render('discogs/album.html.twig', [
            'album' => $album,
            'type' => $type,
            'duration'=> $duration,
            'title'=>$title
        ]);
        }

        /// for artist
        if($type =="artist"){
            $artist = $discogs->getArtist([
            'id' => $id,
        ]);
        return $this->render('discogs/album.html.twig', [
            'artist' => $artist,
            'type' => $type
        ]);
       
        }
        
        

        

    }


}