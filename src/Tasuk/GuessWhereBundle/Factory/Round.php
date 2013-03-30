<?php

namespace Tasuk\GuessWhereBundle\Factory;

use Doctrine\ORM\EntityManager;
use Tasuk\GuessWhere\Entity\Game;

/**
 * Round factory
 */
class Round
{
    private $em;
    private $imageFactory;
    private $imageService;

    /**
     * @param EntityManager $em              Entity manager
     * @param Location      $imageFactory Location factory
     */
    public function __construct(
        EntityManager $em,
        Image $imageFactory,
        ImageServiceInterface $imageService)
    {
        $this->em = $em;
        $this->imageFactory = $imageFactory;
        $this->imageService = $imageService;
    }

    /**
     * Create new round
     *
     * @param array $details Image details
     *
     * @return Tasuk\GuessWhereBundle\Entity\Image
     */
    public function create(Game $game)
    {
        $topPlaces = $this->imageService->getTopPlaces();
        var_dump($topPlaces);
        die;

        $image = $this->em
            ->getRepository('TasukGuessWhereBundle:Image')
            ->find($details['id']);

        return $image;
    }
}

