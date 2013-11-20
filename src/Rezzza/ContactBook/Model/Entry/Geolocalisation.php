<?php

namespace Rezzza\ContactBook\Model\Entry;

use Rezzza\ContactBook\Model\Entry\Entry;

/**
 * Geolocalisation
 *
 * @uses Entry
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class Geolocalisation extends Entry
{
    /**
     * @var float
     */
    protected $latitude;

    /**
     * @var float
     */
    protected $longitude;

    /**
     * @param float $latitude latitude
     *
     * @return Geolocalisation
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * @param float $longitude longitude
     *
     * @return Geolocalisation
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }
}
