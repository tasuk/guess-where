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
class Round extends Entity
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
}
