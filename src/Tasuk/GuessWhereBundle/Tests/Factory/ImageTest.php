<?php

namespace Tasuk\GuessWhereBundle\Tests\Factory;

use Tasuk\GuessWhereBundle\Tests\DatabaseTestCase;
use Tasuk\GuessWhereBundle\Entity\Location;
use Tasuk\GuessWhereBundle\Entity\Image as Entity;
use Tasuk\GuessWhereBundle\Factory\Image as ImageFactory;

/**
 * Image factory test
 *
 * @medium
 */
class ImageTest extends DatabaseTestCase
{
    /**
     * Test Image::get when database entry exists
     */
    public function testGetFromDatabase()
    {
        $image = new Entity;
        $image->setFlickrid(42);
        $image->setOwner('owner');
        $image->setSecret('secret');
        $image->setServer('server');
        $image->setTitle('title');
        $image->setFarm('farm');
        $image->setLocation($this->getLocation());
        $this->getEntityManager()->persist($image);
        $this->getEntityManager()->flush();

        $this->checkReturned($this->getLocationFactory());
    }

    /**
     * Test Image::get when database entry does not exist
     */
    public function testGetFromService()
    {
        $location = $this->getLocation();
        $locationFactory = $this->getLocationFactory();
        $locationFactory->expects($this->once())
            ->method('get')
            ->with(666)
            ->will($this->returnValue($location));

        $this->checkReturned($locationFactory);

        // check that location was saved
        $locationFromDb = $this->getEntityManager()
            ->getRepository('TasukGuessWhereBundle:Location')
            ->find(666);
        $this->assertEquals($location, $locationFromDb);
    }

    /**
     * Check that returned image is ok
     *
     * @param Tasuk\GuessWhereBundle\Factory\Location $locationFactory
     */
    protected function checkReturned($locationFactory)
    {
        $factory = new ImageFactory(
            $this->getEntityManager(),
            $locationFactory
        );
        $image = $factory->get($this->getDetails());

        // check returned location
        $this->assertEquals(42, $image->getFlickrid());
        $this->assertEquals('HL', $image->getLocation()->getCountry());
    }

    /**
     * Create location entity
     *
     * @return Tasuk\GuessWhereBundle\Entity\Location
     */
    protected function getLocation()
    {
        $location = new Location;
        $location->setWoeid(666);
        $location->setCountry('HL');

        return $location;
    }

    /**
     * Simulate location factory mock
     *
     * @return Tasuk\GuessWhereBundle\Factory\Location
     */
    protected function getLocationFactory()
    {
        return $this
            ->getMockBuilder('Tasuk\GuessWhereBundle\Factory\Location')
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * Simulate image details
     *
     * @return array
     */
    protected function getDetails()
    {
        return array(
            'id' => 42,
            'location' => 666,
            'owner' => 'owner',
            'secret' => 'secret',
            'server' => 'server',
            'title' => 'title',
            'farm' => 'farm',
        );
    }
}
