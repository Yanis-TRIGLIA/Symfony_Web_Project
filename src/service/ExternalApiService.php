<?php

namespace App\service; // Modifier la premiÃ¨re lettre en minuscule

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class ExternalApiService {

    private HttpClientInterface $httpClient;
    private $token ;

    public function __construct(HttpClientInterface $httpClient) {
        $this->httpClient = $httpClient;
        $this->token= $_ENV['DISCOGS_TOKEN'];
    }

    public function getDataForMainSearch($fruit, $query, $genre, $style){
        $url = "https://api.discogs.com/database/search?";
        
        if(!$fruit){
            throw new Exception("Aucun fruit passer", 1);
        }else {
            $url = $url."q=".$fruit." ".$query;
        }

        if($genre != "Aucun" && $style == "Aucun"){
            $url = $url."&genre=".$genre;
        }elseif($genre == "Aucun" && $style != "Aucun"){
            $url = $url."&style=".$style;
        }elseif($genre != "Aucun" && $style != "Aucun"){
            $url = $url."&genre=".$genre."&style=".$style;
        }
        
        $url = $url."&token=".$this->token;
        $response = $this->httpClient->request('GET', $url);
        $parsedResponse = $response->toArray();
        return $parsedResponse;
    }

    public function getReleaseDataById($id){
        $url = "https://api.discogs.com/releases/".$id."?token=".$this->token;
        $response = $this->httpClient->request('GET', $url);
        $parsedResponse = $response->toArray();
        return $parsedResponse;
    }

    public function getMasterDataById($id){
        $url = "https://api.discogs.com/masters/".$id."?token=".$this->token;
        $response = $this->httpClient->request('GET', $url);
        $parsedResponse = $response->toArray();
        return $parsedResponse;
    }

    public function getArtistDataById($id){
        $url = "https://api.discogs.com/artists/".$id."?token=".$this->token;
        $response = $this->httpClient->request('GET', $url);
        $parsedResponse = $response->toArray();
        return $parsedResponse;
    }

    public function getLabelDataById($id){
        $url = "https://api.discogs.com/labels/".$id."?token=".$this->token;
        $response = $this->httpClient->request('GET', $url);
        $parsedResponse = $response->toArray();
        return $parsedResponse;
    }
}


