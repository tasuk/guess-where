<?php

namespace Tasuk\GuessWhereBundle\Tests;

use Tasuk\GuessWhereBundle\YahooAPI;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class YahooAPITest extends WebTestCase
{
    private $container;

    public function setUp()
    {
        $appKernel = static::createKernel();
        $appKernel->boot();
        $this->container = $appKernel->getContainer();
    }

    public function testAPI()
    {
        $yahooAPI = $this->container->get('guesswhere.yahoo_api');
        $simpleXml = $yahooAPI->getPlace(23424976);
        $this->assertEquals("Ukraine", $simpleXml->country);
    }
}
