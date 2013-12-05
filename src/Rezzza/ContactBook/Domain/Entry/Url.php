<?php

namespace Rezzza\ContactBook\Domain\Entry;

/**
 * Url
 *
 * @uses Entry
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class Url extends Entry
{
    /**
     * @param array $data
     */
    public function create(array $data)
    {
        $this->raise('createEntryUrl', $data);
    }
}
