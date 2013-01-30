<?php

namespace Tasuk\GuessWhereBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Game
 *
 * @ORM\Entity
 * @ORM\Table(name="games")
 */
class Game
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User", cascade={"all"})
     */
    protected $user;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Round", mappedBy="game", cascade={"all"})
     */
    protected $rounds;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $time;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $score;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rounds = new ArrayCollection();
    }

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
     * Set time
     *
     * @param \DateTime $time
     * @return Game
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set score
     *
     * @param integer $score
     * @return Game
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return integer
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set user
     *
     * @param \Tasuk\GuessWhereBundle\Entity\User $user
     * @return Game
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Tasuk\GuessWhereBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add round
     *
     * @param \Tasuk\GuessWhereBundle\Entity\Round $round
     * @return Game
     */
    public function addRound(Round $round)
    {
        $this->rounds[] = $round;
        $round->setGame($this);

        return $this;
    }

    /**
     * Remove round
     *
     * @param \Tasuk\GuessWhereBundle\Entity\Round $round
     */
    public function removeRound(Round $round)
    {
        $this->rounds->removeElement($round);
    }

    /**
     * Get rounds
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRounds()
    {
        return $this->rounds;
    }
}
