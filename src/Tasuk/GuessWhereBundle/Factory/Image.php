<?php

namespace Tasuk\GuessWhereBundle\Factory;

use Tasuk\GuessWhereBundle\Entity\Image as Entity;
use Doctrine\ORM\EntityManager;

/**
 * Image factory
 */
class Image
{
    private $em;
    private $locationFactory;

    /**
     * @param EntityManager $em              Entity manager
     * @param Location      $locationFactory Location factory
     */
    public function __construct(
        EntityManager $em,
        Location $locationFactory)
    {
        $this->em = $em;
        $this->locationFactory = $locationFactory;
    }

    /**
     * Get Image
     *
     * @param array $details Image details
     *
     * @return Tasuk\GuessWhereBundle\Entity\Image
     */
    public function get($details)
    {
        $image = $this->em
            ->getRepository('TasukGuessWhereBundle:Image')
            ->find($details['id']);

        // if image isn't in repo, create it from service
        if (is_null($image)) {
            $location = $this->locationFactory
                ->get($details['location']);

            $image = new Entity;
            $image->setFlickrid($details['id']);
            $image->setOwner($details['owner']);
            $image->setSecret($details['secret']);
            $image->setServer($details['server']);
            $image->setTitle($details['title']);
            $image->setFarm($details['farm']);
            $image->setLocation($location);

            $this->em->persist($image);
            $this->em->flush();
        }

        return $image;
    }
}
