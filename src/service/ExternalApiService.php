<?php

namespace App\service; // Modifier la premiÃ¨re lettre en minuscule

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class ExternalApiService {

    private HttpClientInterface $httpClient;

    public function __construct(HttpClientInterface $httpClient) {
        $this->httpClient = $httpClient;
    }

    public function getDataForMainSearch($fruit, $query=null, $genre, $style) {

        $token = $_ENV['DISCOGS_TOKEN'];
        $url = "https://api.discogs.com/database/search?";
        
        
        if(!$fruit){
            throw new Exception("Aucun fruit passer", 1);
        }elseif($query != null){
            $url = $url."q=".$fruit." ".$query;
        }else{
            $url = $url."q=".$fruit;
        }

        if($genre != "Aucun" && $style == "Aucun"){
            $url = $url."&genre=".$genre;
        }elseif($genre == "Aucun" && $style != "Aucun"){
            $url = $url."&style=".$style;
        }elseif($genre != "Aucun" && $style != "Aucun"){
            $url = $url."&genre=".$genre."&style=".$style;
        }
        
        $url = $url."&token=".$token;
        $response = $this->httpClient->request('GET', $url);
        $parsedResponse = $response->toArray();
        return $parsedResponse;
    }

    public function getReleaseDataById($id){
        $url = "https://api.discogs.com/releases/".$id;
        $response = $this->httpClient->request('GET', $url);
        $parsedResponse = $response->toArray();
        return $parsedResponse;
    }

    public function getMasterDataById($id){
        $url = "https://api.discogs.com/masters/".$id;
        $response = $this->httpClient->request('GET', $url);
        $parsedResponse = $response->toArray();
        return $parsedResponse;
    }

    public function getArtistDataById($id){
        $url = "https://api.discogs.com/artists/".$id;
        $response = $this->httpClient->request('GET', $url);
        $parsedResponse = $response->toArray();
        return $parsedResponse;
    }

    public function getLabelDataById($id){
        $url = "https://api.discogs.com/labels/".$id;
        $response = $this->httpClient->request('GET', $url);
        $parsedResponse = $response->toArray();
        return $parsedResponse;
    }
}