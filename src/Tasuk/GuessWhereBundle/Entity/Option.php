<?php

namespace Tasuk\GuessWhereBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Option
 *
 * @ORM\Entity
 * @ORM\Table(name="options")
 */
class Option
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

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set chosen
     *
     * @param boolean $chosen
     *
     * @return Option
     */
    public function setChosen($chosen)
    {
        $this->chosen = $chosen;

        return $this;
    }

    /**
     * Get chosen
     *
     * @return boolean
     */
    public function getChosen()
    {
        return $this->chosen;
    }

    /**
     * Set round
     *
     * @param \Tasuk\GuessWhereBundle\Entity\Round $round
     *
     * @return Option
     */
    public function setRound(Round $round)
    {
        $this->round = $round;

        return $this;
    }

    /**
     * Get round
     *
     * @return \Tasuk\GuessWhereBundle\Entity\Round
     */
    public function getRound()
    {
        return $this->round;
    }

    /**
     * Set location
     *
     * @param \Tasuk\GuessWhereBundle\Entity\Location $location
     *
     * @return Option
     */
    public function setLocation(Location $location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return \Tasuk\GuessWhereBundle\Entity\Location
     */
    public function getLocation()
    {
        return $this->location;
    }
}
