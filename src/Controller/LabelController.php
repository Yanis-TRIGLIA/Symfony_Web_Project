<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Service\ExternalApiService;

class LabelController extends AbstractController
{
    #[Route('/label/{id}', name: 'label_read')]
    public function read(Request $request, ExternalApiService $externalApiService, $id): Response
    {
        $label = $externalApiService->getLabelDataById($id);

        return $this->render('label/read.html.twig', ['label' => $label]);
    }
}
