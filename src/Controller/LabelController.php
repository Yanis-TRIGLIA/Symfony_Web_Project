<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

use Discogs\DiscogsClient;

class LabelController extends AbstractController
{
    #[Route('/label/{id}', name: 'label_read')]
    public function read(Request $request,DiscogsClient $discogs,$id): Response
    {

        $label = $discogs->getLabel(['id' => $id,]);

        return $this->render('label/read.html.twig', ['label' => $label]);
    }
}
