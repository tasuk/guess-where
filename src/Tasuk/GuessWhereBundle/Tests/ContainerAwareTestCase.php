<?php

namespace Tasuk\GuessWhereBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * TestCase with Container
 */
abstract class ContainerAwareTestCase extends WebTestCase
{
    protected $appKernel;

    /**
     * Create app kernel
     */
    public function setUp()
    {
        $kernel = static::createKernel();
        $kernel->boot();
        $this->appKernel = $kernel;
    }

    /**
     * @return Symfony\Component\DependencyInjection\ContainerInterface
     */
    protected function getContainer()
    {
        return $this->appKernel->getContainer();
    }
}
