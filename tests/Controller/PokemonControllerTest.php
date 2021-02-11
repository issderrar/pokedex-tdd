<?php


namespace App\Tests\Controller;



use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PokemonControllerTest extends WebTestCase
{

    public function testIndexRoute()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertEquals(20, $crawler->filter('#pokemon')->count());
    }

    public function testDetailsRoute()
    {
        $client = static::createClient();

        //$index = rand(1,151);
        $index = 1;
        $client->request('GET', '/pokemon/'.$index);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSelectorTextContains('html h1', 'Hello Bulbasaur !');
    }

}