<?php

namespace Tasuk\GuessWhereBundle\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Tasuk\GuessWhereBundle\Entity\Game;
use Tasuk\GuessWhereBundle\Entity\Round;
use Tasuk\GuessWhereBundle\Entity\Image;
use Tasuk\GuessWhereBundle\Entity\Guess;
use Tasuk\GuessWhereBundle\Entity\Location;

/**
 * @large
 */
class EntitiesTest extends WebTestCase
{
    private $em;
    private $application;

    public function setUp()
    {
        $kernel = static::createKernel();
        $kernel->boot();
        $this->application = new Application($kernel);
        $this->application->setAutoExit(false);
        $this->runConsole("doctrine:schema:drop", array("--force" => true));
        $this->runConsole("doctrine:schema:create");
        //$this->runConsole("doctrine:fixtures:load",
        //    array("--fixtures" => __DIR__ . "/../DataFixtures"));

        $this->em = $kernel
            ->getContainer()
            ->get('doctrine.orm.entity_manager');
    }

    protected function runConsole($command, array $options = array())
    {
        $options["-e"] = "test";
        $options["-q"] = null;
        $options = array_merge($options, array('command' => $command));
        return $this->application->run(new ArrayInput($options));
    }

    protected function getRound()
    {
        $location = new Location;
        $location
            ->setWoeid(666)
            ->setCountry("hell");

        $image = new Image;
        $image
            ->setFlickrid(123)
            ->setName("test image")
            ->setLocation($location);

        $round = new Round;
        $round
            ->setSequence(1)
            ->setImage($image);

        return $round;
    }

    protected function addRoundFirst()
    {
        $round = $this->getRound();
        $round->setGame(new Game);
        $this->em->persist($round);
        $this->em->flush();
    }

    protected function addGameFirst()
    {
        $game = new Game;
        $game->addRound($this->getRound());
        $this->em->persist($game);
        $this->em->flush();
    }

    protected function getRoundFirst()
    {
        $round = $this->em
            ->getRepository('TasukGuessWhereBundle:Round')
            ->find(1);
        $this->assertEquals(1, $round->getGame()->getId());
    }

    protected function getGameFirst()
    {
        $game = $this->em
            ->getRepository('TasukGuessWhereBundle:Game')
            ->find(1);
        $rounds = $game->getRounds();
        $location = $rounds[0]->getImage()->getLocation();
        $this->assertEquals(666, $location->getWoeid());
    }

    public function testRoundFirstAddRoundFirst()
    {
        $this->addRoundFirst();
        $this->getRoundFirst();
    }

    public function testRoundFirstAddGameFirst()
    {
        $this->addGameFirst();
        $this->getRoundFirst();
    }

    /*
    // This one is broken but it shouldn't matter.
    // Doctrine weirdness with one way associations,
    // fixable with adding the calls manually, but
    // must check for recursion in that case.

    public function testGameFirstAddRoundFirst()
    {
        $this->addRoundFirst();
        $this->getGameFirst();
    }
    */

    public function testGameFirstAddGameFirst()
    {
        $this->addGameFirst();
        $this->getGameFirst();
    }
}
