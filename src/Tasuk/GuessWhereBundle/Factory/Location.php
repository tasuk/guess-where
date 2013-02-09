<?php

namespace Tasuk\GuessWhereBundle\Factory;

use Tasuk\GuessWhereBundle\Entity\Location as Entity;
use Doctrine\ORM\EntityManager;

/**
 * Location factory
 */
class Location
{
    private $em;
    private $locationService;

    /**
     * @param EntityManager            $em              Entity manager
     * @param LocationServiceInterface $locationService Location service
     */
    public function __construct(
        EntityManager $em,
        LocationServiceInterface $locationService)
    {
        $this->em = $em;
        $this->locationService = $locationService;
    }

    /**
     * Get Location
     *
     * @param int $woeid Location WOEID
     *
     * @return Tasuk\GuessWhereBundle\Entity\Location
     */
    public function get($woeid)
    {
        $location = $this->em
            ->getRepository('TasukGuessWhereBundle:Location')
            ->find($woeid);

        // if location isn't in repo, create it from service
        if (is_null($location)) {
            $location = new Entity;
            $location->setWoeid($woeid);
            $location->setCountry(
                $this->locationService->getCountryCode($woeid)
            );
            $this->em->persist($location);
            $this->em->flush();
        }

        return $location;
    }
}
