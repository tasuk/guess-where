<?php

namespace Tasuk\GuessWhereBundle\Tests\Client;

use Tasuk\GuessWhereBundle\Tests\ContainerAwareTestCase;
use Tasuk\GuessWhereBundle\Client\Yahoo;

/**
 * @large
 */
class YahooTest extends ContainerAwareTestCase
{
    public function testGetPlace()
    {
        $yahoo = $this->getContainer()->get('guesswhere.yahoo_client');
        $simpleXml = $yahoo->getPlace(23424976);
        $this->assertEquals("Ukraine", $simpleXml->xml()->country);
    }
}
