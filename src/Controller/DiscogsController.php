<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Service\ExternalApiService;

use Discogs\DiscogsClient;

class DiscogsController extends AbstractController
{

    #[Route('/search/{name}/{fruit}/{style}/{genre}', name: 'search')]
    public function search_with_filter(ExternalApiService $externalApiService, $name, $fruit ,$style, $genre)
    {
 
    
        $results = $externalApiService->getDataForMainSearch($fruit,$name,$genre,$style);
  
        $img = [];
        $title = [];
        $id = [];
        $type = [];


        foreach ($results['results'] as $result) {
                $title[] = $result['title'];
                $img[] = $result['cover_image'];
                $id[] = $result['id'];
                $type[] = $result['type'];

        }

        #$test = $externalApiService->getDataForMainSearch($name,$style,$genre);
        #'test' => $test
        return $this->render('discogs/index.html.twig', [
            'title' => $title,
            'img' => $img,
            'id' => $id,
            'type' => $type,
            
        ]);
    }
    
}