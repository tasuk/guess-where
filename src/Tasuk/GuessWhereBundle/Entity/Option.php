<?php

namespace Tasuk\GuessWhereBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Option
 *
 * @ORM\Entity
 * @ORM\Table(name="options")
 */
class Option extends Entity
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var Round
     *
     * @ORM\ManyToOne(targetEntity="Round", cascade={"all"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $round;

    /**
     * @var Location
     *
     * @ORM\ManyToOne(targetEntity="Location", cascade={"all"})
     * @ORM\JoinColumn(referencedColumnName="woeid", nullable=false)
     */
    private $location;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $chosen;
}
