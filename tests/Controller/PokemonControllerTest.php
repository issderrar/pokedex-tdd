<?php


namespace App\Tests\Controller;



use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PokemonControllerTest extends WebTestCase
{

    public function testIndexRoute()
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testDetailsRoute()
    {
        $client = static::createClient();

        $client->request('GET', '/pokemon/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSelectorTextContains('html h1', 'Hello Bulbasaur !');
    }

}