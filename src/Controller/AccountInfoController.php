<?php

namespace App\Controller;

use App\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Album;

class AccountInfoController extends AbstractController
{

    #[Route('/account/info', name: 'app_account_info')]
        public function index(): Response
        { 
                
                return $this->render('account_info/index.html.twig', [
                
                ]);
                
        }
    
}
