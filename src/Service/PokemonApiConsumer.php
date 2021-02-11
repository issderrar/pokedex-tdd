<?php


namespace App\Service;


use Symfony\Contracts\HttpClient\HttpClientInterface;

class PokemonApiConsumer
{
    private $client;

    private $baseUrl = "https://pokeapi.co/api/v2/";

    public function __construct(HttpClientInterface $client) {
        $this->client = $client;
    }


    public function getAllPokemons($limit = 151, $offset = 0)
    {
        $url = 'pokemon/?limit='.$limit.'&offset='.$offset;

        return $this->sendRequest($url);
    }

    public function getPokemon($index)
    {
        $url = 'pokemon/'.$index;

        return $this->sendRequest($url);
    }

    /**
     * @param string $url
     */
    public function sendRequest($url)
    {
        $response = $this->client->request(
            'GET',
            $this->baseUrl.$url
        );

        if ($response->getStatusCode() != 200) {
            return json_encode('An error has occured.');
        }

        return $response->toArray();

    }
}