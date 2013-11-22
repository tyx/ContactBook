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
     * @param integer $id  id
     * @param string  $url url
     */
    public function __construct($id, $url)
    {
        $this->id  = $id;
        $this->url = $url;

        $this->raise('CreateEntryUrl', array('id' => $id, 'url' => $url));
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}
