<?php

namespace Tasuk\GuessWhereBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Location
 *
 * @ORM\Entity
 * @ORM\Table(name="locations")
 */
class Location extends Entity
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(type="integer", nullable=false)
     */
    protected $woeid;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=2, nullable=false)
     */
    protected $country;
}
