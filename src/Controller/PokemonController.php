<?php

namespace App\Controller;

use App\Service\PokemonApiConsumer;
use PokePHP\PokeApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PokemonController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $api = new PokeApi();
        return $this->render('pokemon/index.html.twig', [
            'controller_name' => 'PokemonController',
            'pokemons' => $api->resourceList('pokemons')
        ]);
    }

    /**
     * @Route("/pokemon/{pokemonId}", name="details")
     */
    public function details(PokemonApiConsumer $apiConsumer, $pokemonId): Response
    {
        return $this->render('pokemon/details.html.twig', [
            'controller_name' => 'PokemonController',
            'pokemon' => $apiConsumer->fetchPokemon($pokemonId)
        ]);
    }
}
