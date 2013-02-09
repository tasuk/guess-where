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
     * Integration test for Yahoo::getCountryCode
     */
    public function testGetCountryCode()
    {
        $countryCode = $this->getContainer()
            ->get('guesswhere.yahoo_client')
            ->getCountryCode(23424976);

        $this->assertEquals('UA', $countryCode);
    }
}
