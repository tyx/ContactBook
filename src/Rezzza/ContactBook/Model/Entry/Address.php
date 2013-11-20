<?php

namespace Rezzza\ContactBook\Model\Entry;

use Rezzza\ContactBook\Model\Entry\Entry;

/**
 * Address
 *
 * @uses Entry
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class Address extends Entry
{
    /**
     * @var string
     */
    protected $streetOne;

    /**
     * @var string
     */
    protected $streetTwo;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var string
     */
    protected $state;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $zipCode;

    /**
     * @param string $v v
     *
     * @return Address
     */
    public function setStreetOne($v)
    {
        $this->streetOne = $v;

        return $this;
    }

    /**
     * @return string
     */
    public function getStreetOne()
    {
        return $this->streetOne;
    }

    /**
     * @param string $v v
     *
     * @return Address
     */
    public function setStreetTwo($v)
    {
        $this->streetTwo = $v;

        return $this;
    }

    /**
     * @return string
     */
    public function getStreetTwo()
    {
        return $this->streetTwo;
    }

    /**
     * @param string $v v
     *
     * @return Address
     */
    public function setCountry($v)
    {
        $this->country = $v;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $v v
     *
     * @return Address
     */
    public function setState($v)
    {
        $this->state = $v;

        return $this;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $v v
     *
     * @return Address
     */
    public function setCity($v)
    {
        $this->city = $v;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $v v
     *
     * @return Address
     */
    public function setZipCode($v)
    {
        $this->zipCode = $v;

        return $this;
    }

    /**
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }
}
