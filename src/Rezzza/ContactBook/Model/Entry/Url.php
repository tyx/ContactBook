<?php

namespace Rezzza\ContactBook\Model\Entry;

use Rezzza\ContactBook\Model\Entry\Entry;

/**
 * Url
 *
 * @uses Entry
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class Url extends Entry
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @param string $url url
     *
     * @return Url
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}
