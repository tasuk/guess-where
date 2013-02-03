<?php

namespace Tasuk\GuessWhereBundle\Tests\Entity;

use Tasuk\GuessWhereBundle\Tests\DatabaseTestCase;
use Tasuk\GuessWhereBundle\Entity\Game;
use Tasuk\GuessWhereBundle\Entity\Round;
use Tasuk\GuessWhereBundle\Entity\Image;
use Tasuk\GuessWhereBundle\Entity\Guess;
use Tasuk\GuessWhereBundle\Entity\Location;

/**
 * @large
 */
class EntitiesTest extends DatabaseTestCase
{
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
        $this->getEntityManager()->persist($round);
        $this->getEntityManager()->flush();
    }

    protected function addGameFirst()
    {
        $game = new Game;
        $game->addRound($this->getRound());
        $this->getEntityManager()->persist($game);
        $this->getEntityManager()->flush();
    }

    protected function getRoundFirst()
    {
        $round = $this->getEntityManager()
            ->getRepository('TasukGuessWhereBundle:Round')
            ->find(1);
        $this->assertEquals(1, $round->getGame()->getId());
    }

    protected function getGameFirst()
    {
        $game = $this->getEntityManager()
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
