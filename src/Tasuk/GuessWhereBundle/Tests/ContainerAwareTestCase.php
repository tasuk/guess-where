<?php

namespace Tasuk\GuessWhereBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

abstract class ContainerAwareTestCase extends WebTestCase
{
    protected $appKernel;

    public function setUp()
    {
        $kernel = static::createKernel();
        $kernel->boot();
        $this->appKernel = $kernel;
    }

    protected function getContainer()
    {
        return $this->appKernel->getContainer();
    }
}
