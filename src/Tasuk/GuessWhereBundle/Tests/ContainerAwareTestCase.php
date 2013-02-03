<?php

namespace Tasuk\GuessWhereBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @large
 */
class ContainerAwareTestCase extends WebTestCase
{
    protected $container;

    public function setUp()
    {
        $appKernel = static::createKernel();
        $appKernel->boot();
        $this->container = $appKernel->getContainer();
    }
}

