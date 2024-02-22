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
use App\Service\ExternalApiService;
use App\Repository\AlbumRepository;
use App\Repository\ListeRepository;


class AlbumController extends AbstractController
{
    #[Route('/album/{type}/{id}', name: 'album_read')]
    public function read(Request $request,ExternalApiService $externalApiService, AlbumRepository $albumRepository, $id,$type): Response
    {
        if($type =="release"){
            $album = $externalApiService->getReleaseDataById($id);
        } else {
            $album = $externalApiService->getMasterDataById($id);
        }

        $duration = [];
        $title = [];
        foreach ($album['tracklist'] as $track) {            
            $title [] = $track['title'];
            $duration[] = $track['duration'];
        }

        if($user = $this->getUser()){
            $existingAlbum = $albumRepository->findOneBy(['name' => $album['title']]);
        }else{
            $existingAlbum = null;
        }

        return $this->render('album/read.html.twig', [
            'album' => $album,
            'type' => $type,
            'duration'=> $duration,
            'title'=>$title,
            'existingAlbum' => $existingAlbum
        ]);
    }

    #[Route('/album/create/{type}/{id}', name:'create_album')]
    public function create(EntityManagerInterface $entityManager, ExternalApiService $externalApiService, $type, $id): Response
    {
        /** @var Users $user */
        $user = $this->getUser();
        if (!$user) {
            throw $this->createNotFoundException('Pas de compte log.');
        }

        $existingList = $user->getList();

        if($type =="release"){
            $discogsAlbum = $externalApiService->getReleaseDataById($id);
        } else {
            $discogsAlbum = $externalApiService->getMasterDataById($id);
        }

        
        $existingAlbum = $entityManager->getRepository(Album::class)->findOneBy(['name' => $discogsAlbum['title']]);

        if (!$existingAlbum) {

            $album = new Album();
            $album->setName($discogsAlbum['title']);
            if(isset($discogsAlbum['country'])){ 
                $album->setCountries($country);
            }
            $album->setReleaseDate(new \DateTime($discogsAlbum['year']));

            $cover = new Cover();
            $cover->setUrl($discogsAlbum['images'][0]['uri']);
            
            $albumCover = new AlbumCover();
            $albumCover->setIdAlbum($album);
            $albumCover->setIdCover($cover);

            $album->setAlbumCover($albumCover);

            $entityManager->persist($album);
            $entityManager->persist($cover);
            $entityManager->persist($albumCover);

            $existingAlbum = $album;
        }

        $existingList[0]->addAlbum($existingAlbum);
        $entityManager->persist($existingList[0]);
        $entityManager->flush();

        return $this->render('account_info/MyAlbum.html.twig', [
            'list' => $existingList[0]
        ]);
    }

    #[Route('/album/delete/{type}/{id}', name:'delete_album')]
    public function delete(AlbumRepository $albumRepository, ListeRepository $listRepository, EntityManagerInterface $entityManager, $type, $id){
        $user = $this->getUser();
        if (!$user) {
            throw $this->createNotFoundException('Pas de compte log.');
        }

        $existingList = $user->getList();

        $album = $albumRepository->find($id);

        $userList = $listRepository->findBy(['users' => [$user]]);

        $listWhereTheAlbumExist = $listRepository->find();

        dd($album, $listWhereTheAlbumExist, $userList);
    }
}
   
    


