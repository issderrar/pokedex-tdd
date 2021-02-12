<?php


namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PokemonControllerTest extends WebTestCase
{

    public function testIndexRoute()
    {
        $client = static::createClient();

        // Random limit and offset to test all cases
        $limit = rand(1, 450);
        $offset = rand(1, 450);

        // Random limit and offset to test all cases
        $crawler = $client->request('GET', '/?limit=' . $limit . '&offset=' . $offset);

        // Test response status code
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        // Test number of displayed card with random limit
        $this->assertEquals($limit, $crawler->filter('.pokemonCard')->count());

        // Test index of first card with random offset
        $this->assertSelectorTextContains('.pokemonCard', $offset + 1);

    }

    public function testDetailsRoute()
    {
        $client = static::createClient();

        $index = 1;
        $client->request('GET', '/pokemon/' . $index);

        // Test response status code
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        // Test if name is Bulbasaur when index equals 1
        $this->assertSelectorTextContains('html h1', 'Bulbasaur');

        // Test if displayed index is the right one
        $this->assertSelectorTextContains('#index', $index);
    }

    public function testNavigationFromIndexToDetails()
    {

        $client = static::createClient();

        $index = rand(1, 151);

        $crawler = $client->request('GET', '/');

        // Get link from a random card
        $link = $crawler
            ->filter('#pokemonslist a') // find all links with the text "Greet"
            ->eq($index - 1) // select the second link in the list
            ->link();

        // Click on the link
        $crawler = $client->click($link);


        // Test if displayed index is the right one
        $this->assertSelectorTextContains('#index', $index);
    }

}