<?php

namespace Tasuk\GuessWhereBundle\Tests\Factory;

use Tasuk\GuessWhereBundle\Tests\DatabaseTestCase;
use Tasuk\GuessWhereBundle\Entity\Location as Entity;
use Tasuk\GuessWhereBundle\Factory\Location as LocationFactory;

/**
 * Location factory test
 *
 * @medium
 */
class LocationTest extends DatabaseTestCase
{
    /**
     * Test Location::get when database entry exists
     */
    public function testGetFromDatabase()
    {
        $location = new Entity;
        $location->setWoeid(666);
        $location->setCountry('HL');
        $this->getEntityManager()->persist($location);
        $this->getEntityManager()->flush();

        $client = $this->getMock('Tasuk\GuessWhereBundle\Factory\LocationServiceInterface');

        $factory = new LocationFactory($this->getEntityManager(), $client);
        $this->assertEquals('HL', $factory->get(666)->getCountry());
    }

    /**
     * Test Location::get when database entry does not exist
     */
    public function testGetFromService()
    {
        $em = $this->getEntityManager();

        $client = $this->getMock('Tasuk\GuessWhereBundle\Factory\LocationServiceInterface');
        $client->expects($this->once())
            ->method('getCountryCode')
            ->with(666)
            ->will($this->returnValue('HL'));

        $factory = new LocationFactory($em, $client);
        $location = $factory->get(666);

        // check returned location
        $this->assertEquals(666, $location->getWoeid());
        $this->assertEquals('HL', $location->getCountry());

        // check that location was saved
        $locationFromDb = $em
            ->getRepository('TasukGuessWhereBundle:Location')
            ->find(666);
        $this->assertEquals($location, $locationFromDb);
    }
}
