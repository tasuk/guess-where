<?php

namespace Tasuk\GuessWhereBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Round
 *
 * @ORM\Entity
 * @ORM\Table(name="rounds")
 */
class Round
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
     * @var Game
     *
     * @ORM\ManyToOne(targetEntity="Game", inversedBy="rounds", cascade={"all"})
     * @ORM\JoinColumn(referencedColumnName="id", nullable=false)
     */
    protected $game;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=false)
     */
    protected $sequence;

    /**
     * @var Image
     *
     * @ORM\ManyToOne(targetEntity="Image", cascade={"all"})
     * @ORM\JoinColumn(referencedColumnName="flickrid", nullable=false)
     */
    protected $image;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Option", mappedBy="round", cascade={"all"})
     */
    protected $options;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->options = new ArrayCollection();
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
     * Set sequence
     *
     * @param integer $sequence
     * @return Round
     */
    public function setSequence($sequence)
    {
        $this->sequence = $sequence;

        return $this;
    }

    /**
     * Get sequence
     *
     * @return integer
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * Set game
     *
     * @param \Tasuk\GuessWhereBundle\Entity\Game $game
     * @return Round
     */
    public function setGame(Game $game)
    {
        $this->game = $game;

        return $this;
    }

    /**
     * Get game
     *
     * @return \Tasuk\GuessWhereBundle\Entity\Game
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * Set image
     *
     * @param \Tasuk\GuessWhereBundle\Entity\Image $image
     * @return Round
     */
    public function setImage(Image $image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Tasuk\GuessWhereBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Add option
     *
     * @param \Tasuk\GuessWhereBundle\Entity\Option $option
     * @return Round
     */
    public function addOption(Option $option)
    {
        $this->options[] = $option;
        $option->setRound($this);

        return $this;
    }

    /**
     * Remove option
     *
     * @param \Tasuk\GuessWhereBundle\Entity\Option $option
     */
    public function removeOption(Option $option)
    {
        $this->options->removeElement($option);
    }

    /**
     * Get options
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOptions()
    {
        return $this->options;
    }
}
