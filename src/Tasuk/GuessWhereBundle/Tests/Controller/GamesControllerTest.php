<?php

namespace Tasuk\GuessWhereBundle\Tests\Entity;

use Tasuk\GuessWhereBundle\Tests\DatabaseTestCase;
use Symfony\Bundle\FrameworkBundle\Client;

/**
 * Test GamesController
 */
class GamesControllerTest extends DatabaseTestCase
{
    protected $env = 'integration';

    /**
     * Set up database
     */
    protected function setUpDb()
    {
        $console = __DIR__ . '/../../../../../app/console';
        shell_exec("$console doctrine:schema:drop --env={$this->env} --force");
        shell_exec("$console doctrine:schema:create --env={$this->env}");
    }

    /**
     * Post games and check response contents
     *
     * @param Client $client
     *
     * @return Symfony\Component\BrowserKit\Response
     */
    protected function postGames(Client $client)
    {
        $crawler = $client->request('POST', '/games', array());
        $response = $client->getResponse();

        $this->assertTrue($response->headers->contains(
            'Content-Type', 'application/json'
        ));
        $this->assertContains('/games/1', $response->headers->get('Location'));

        return $response;
    }

    /**
     * Test postGamesAction
     */
    public function testPostGames()
    {
        $client = static::createClient(array(
            'environment' => $this->env,
        ), array(
            'HTTP_ACCEPT' => 'application/json',
        ));

        $statusCode = $this->postGames($client)->getStatusCode();
        $this->assertEquals(201, $statusCode);

        $statusCode = $this->postGames($client)->getStatusCode();
        $this->assertEquals(302, $statusCode);
    }
}
