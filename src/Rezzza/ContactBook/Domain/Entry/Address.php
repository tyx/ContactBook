<?php

namespace Rezzza\ContactBook\Domain\Entry;

/**
 * Address
 *
 * @uses Entry
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class Address extends Entry
{
    /**
     * @param array $data
     */
    public function create(array $data)
    {
        $this->raise('createEntryAddress', $data);
    }
}
