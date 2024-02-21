<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Album;
use App\Entity\Cover;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Users;
use App\Entity\AlbumCover;
use Twig\Environment;


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

    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager,Environment $twig)
    {
        $this->entityManager = $entityManager;
    }

    

    #[Route('/create_album/{name}/{country}/{date}/{url}', name:'create_album')]
    public function create_album($name, $country, $date, $url): Response
    {
        /** @var Users $user */
        $user = $this->getUser();
        if (!$user) {
            throw $this->createNotFoundException('Pas de compte log.');
        }

        $existingList = $user->getList();
        $existingAlbum = $this->entityManager->getRepository(Album::class)->findOneBy(['name' => $name]);

        if (!$existingAlbum) {

            $album = new Album();
            $album->setName($name);
            $album->setCountries($country);
            $album->setReleaseDate(new \DateTime($date));

            $cover = new Cover();
            $cover->setUrl($url);

            $albumCover = new AlbumCover();
            $albumCover->setIdAlbum($album);
            $albumCover->setIdCover($cover);

            $album->setAlbumCover($albumCover);

            $this->entityManager->persist($album);
            $this->entityManager->persist($cover);
            $this->entityManager->persist($albumCover);

            $existingList[0]->addAlbum($album);
            $this->entityManager->persist($existingList[0]);

            $this->entityManager->flush();

            return $this->render('account_info/MyAlbum.html.twig', [
                'list' => $existingList[0]
            ]);
        }

        $existingList[0]->addAlbum($existingAlbum);
        $this->entityManager->persist($existingList[0]);
        $this->entityManager->flush();

        return $this->render('account_info/MyAlbum.html.twig', [
            'list' => $existingList[0]
        ]);
    }
}
   
    


