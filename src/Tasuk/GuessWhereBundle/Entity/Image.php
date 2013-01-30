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
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     * @var Location
     *
     * @ORM\ManyToOne(targetEntity="Location", cascade={"all"})
     * @ORM\JoinColumn(referencedColumnName="woeid", nullable=false)
     */
    protected $location;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $url;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $url_m;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $url_s;

    /**
     * Set flickrid
     *
     * @param integer $flickrid
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
     * Set name
     *
     * @param string $name
     * @return Image
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set location
     *
     * @param \Tasuk\GuessWhereBundle\Entity\Location $location
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

    /**
     * Set url
     *
     * @param string $url
     * @return Image
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set url_m
     *
     * @param string $urlM
     * @return Image
     */
    public function setUrlM($urlM)
    {
        $this->url_m = $urlM;

        return $this;
    }

    /**
     * Get url_m
     *
     * @return string
     */
    public function getUrlM()
    {
        return $this->url_m;
    }

    /**
     * Set url_s
     *
     * @param string $urlS
     * @return Image
     */
    public function setUrlS($urlS)
    {
        $this->url_s = $urlS;

        return $this;
    }

    /**
     * Get url_s
     *
     * @return string
     */
    public function getUrlS()
    {
        return $this->url_s;
    }
}
