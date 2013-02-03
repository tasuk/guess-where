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
        $flickr = $this->getContainer()->get('guesswhere.flickr_client');
        $response = $flickr->getTopPlaces();

        $places = array();
        foreach ($response->xml()->places->place as $place) {
            $places[] = (string) $place;
        }

        $this->assertContains('Ukraine', $places);
    }

    public function testGetTopPhotos()
    {
        $flickr = $this->getContainer()->get('guesswhere.flickr_client');
        $response = $flickr->getTopPhotos(23424976, '6 months', 10);

        // be happy with any numeric photo id
        $this->assertTrue(is_numeric(
            (string) $response->xml()->photos->photo['id']
        ));
    }
}
