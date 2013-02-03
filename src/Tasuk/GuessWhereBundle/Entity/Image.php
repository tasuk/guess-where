<?php

namespace Tasuk\GuessWhereBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Image
 *
 * @ORM\Entity
 * @ORM\Table(name="images")
 */
class Image
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(type="bigint")
     */
    protected $flickrid;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20)
     */
    protected $owner;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=15)
     */
    protected $secret;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    protected $server;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    protected $farm;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $title;

    /**
     * @var Location
     *
     * @ORM\ManyToOne(targetEntity="Location", cascade={"all"})
     * @ORM\JoinColumn(referencedColumnName="woeid", nullable=false)
     */
    protected $location;

    /**
     * Set flickrid
     *
     * @param integer $flickrid
     *
     * @return Image
     */
    public function setFlickrid($flickrid)
    {
        $this->flickrid = $flickrid;

        return $this;
    }

    /**
     * Get flickrid
     *
     * @return integer
     */
    public function getFlickrid()
    {
        return $this->flickrid;
    }

    /**
     * Set owner
     *
     * @param string $owner
     *
     * @return Image
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return string
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set secret
     *
     * @param string $secret
     *
     * @return Image
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;

        return $this;
    }

    /**
     * Get secret
     *
     * @return string
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * Set server
     *
     * @param integer $server
     *
     * @return Image
     */
    public function setServer($server)
    {
        $this->server = $server;

        return $this;
    }

    /**
     * Get server
     *
     * @return integer
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * Set farm
     *
     * @param integer $farm
     *
     * @return Image
     */
    public function setFarm($farm)
    {
        $this->farm = $farm;

        return $this;
    }

    /**
     * Get farm
     *
     * @return integer
     */
    public function getFarm()
    {
        return $this->farm;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Image
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set location
     *
     * @param \Tasuk\GuessWhereBundle\Entity\Location $location
     *
     * @return Image
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
