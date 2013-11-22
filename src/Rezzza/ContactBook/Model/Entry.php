<?php

namespace Rezzza\ContactBook\Model;

/**
 * Entry
 *
 * @author Stephane PY <py.stephane1@gmail.com>
 */
abstract class Entry
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
