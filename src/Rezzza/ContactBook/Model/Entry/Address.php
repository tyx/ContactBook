<?php

namespace Rezzza\ContactBook\Model\Entry;

use Rezzza\ContactBook\Model\Entry;

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
     * @param integer $id        id
     * @param string  $streetOne streetOne
     * @param string  $streetTwo streetTwo
     * @param string  $country   country
     * @param string  $state     state
     * @param string  $city      city
     * @param string  $zipCode   zipCode
     */
    public function __construct($id, $streetOne, $streetTwo, $country, $state, $city, $zipCode)
    {
        $this->id        = $id;
        $this->streetOne = $streetOne;
        $this->streetTwo = $streetTwo;
        $this->country   = $country;
        $this->state     = $state;
        $this->city      = $city;
        $this->zipCode   = $zipCode;
    }

    /**
     * @return string
     */
    public function getStreetOne()
    {
        return $this->streetOne;
    }

    /**
     * @return string
     */
    public function getStreetTwo()
    {
        return $this->streetTwo;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }
}
