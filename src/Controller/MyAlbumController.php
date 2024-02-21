<?php

namespace App\Controller;

use App\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class MyAlbumController extends AbstractController
{

    #[Route('/account/my_album', name: 'app_account_album')]
        public function index(): Response
        {
             /** @var Users $user */
             $user = $this->getUser();
             if (!$user) {
                 throw $this->createNotFoundException('Pas de compte log.');
             }

             $existingList = $user->getList();
         
             $list = $existingList[0];    
             
             return $this->render('account_info/MyAlbum.html.twig', [
                 'list' => $list
             ]);
    
        }
    
}
