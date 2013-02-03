<?php

namespace Tasuk\GuessWhereBundle\Tests\Client;

use Tasuk\GuessWhereBundle\Tests\ContainerAwareTestCase;
use Tasuk\GuessWhereBundle\Client\Flickr;

/**
 * @large
 */
class FlickrTest extends ContainerAwareTestCase
{
    public function testGetTopPlaces()
    {
        $flickr = $this->container->get('guesswhere.flickr_client');
        $simpleXml = $flickr->getTopPlaces();

        $places = array();
        foreach ($simpleXml->xml()->places->place as $place) {
            $places[] = (string) $place;
        }

        $this->assertContains("Ukraine", $places);
    }
}
