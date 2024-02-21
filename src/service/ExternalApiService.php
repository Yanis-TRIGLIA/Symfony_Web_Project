<?php

namespace App\service; // Modifier la première lettre en minuscule

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class ExternalApiService {

    private HttpClientInterface $httpClient;

    public function __construct(HttpClientInterface $httpClient) {
        $this->httpClient = $httpClient;
    }

    public function getData(): JsonResponse {
        $response = $this->httpClient->request('GET', 'API.com');

        return new JsonResponse($response->getContent(), $response->getStatusCode(), [], true);
    }
}

