<?php

namespace Tasuk\GuessWhereBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Location
 *
 * @ORM\Entity
 * @ORM\Table(name="locations")
 */
class Location
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

    /**
     * Set woeid
     *
     * @param integer $woeid
     * @return Location
     */
    public function setWoeid($woeid)
    {
        $this->woeid = $woeid;

        return $this;
    }

    /**
     * Get woeid
     *
     * @return integer
     */
    public function getWoeid()
    {
        return $this->woeid;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Location
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }
}
