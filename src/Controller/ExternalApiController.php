<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Service\ExternalApiService;

class ExternalApiController extends AbstractController {

    #[Route('/api', name: 'api')]
    public function read(ExternalApiService $apiService): Response
    {

        $truc = $apiService->getData();
        return $truc;

    }

}