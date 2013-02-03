<?php

namespace Tasuk\GuessWhereBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;

/**
 * TestCase with dummy database
 */
abstract class DatabaseTestCase extends ContainerAwareTestCase
{
    /**
     * Clear and import database
     */
    public function setUp()
    {
        parent::setUp();

        $application = new Application($this->appKernel);
        $application->setAutoExit(false);
        $this->runConsole($application, "doctrine:schema:drop", array("--force" => true));
        $this->runConsole($application, "doctrine:schema:create");
    }

    /**
     * Run command with options in application
     *
     * @param Application $application Console application
     * @param string      $command     Command to run
     * @param array       $options     Options for command
     *
     * @return int return code
     */
    protected function runConsole(
        Application $application,
        $command,
        array $options = array()
    )
    {
        $options["-e"] = "test";
        $options["-q"] = null;
        $options = array_merge($options, array('command' => $command));

        return $application->run(new ArrayInput($options));
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEntityManager()
    {
        return $this->getContainer()->get('doctrine.orm.entity_manager');
    }
}
