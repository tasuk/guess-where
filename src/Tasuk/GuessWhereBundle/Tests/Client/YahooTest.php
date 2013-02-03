<?php

namespace Tasuk\GuessWhereBundle\Tests\Client;

use Tasuk\GuessWhereBundle\Tests\ContainerAwareTestCase;
use Tasuk\GuessWhereBundle\Client\Yahoo;

/**
 * Test Yahoo API
 *
 * @large
 */
class YahooTest extends ContainerAwareTestCase
{
    /**
     * Integration test for Yahoo::getPlace
     */
    public function testGetPlace()
    {
        $yahoo = $this->getContainer()->get('guesswhere.yahoo_client');
        $response = $yahoo->getPlace(23424976);
        $this->assertEquals('Ukraine', $response->xml()->country);
    }
}
