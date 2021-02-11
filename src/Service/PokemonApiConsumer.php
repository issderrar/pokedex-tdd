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


    public function fetchPokemons()
    {
        $response = $this->client->request(
            'GET',
            $this->baseUrl.'pokemon'
        );

        return $response->toArray();
    }

    public function fetchPokemon($index)
    {
        $response = $this->client->request(
            'GET',
            $this->baseUrl.'pokemon/' . $index
        );

        return $response->toArray();
    }
}