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
     * @param integer $id id
     *
     * @return Group
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
