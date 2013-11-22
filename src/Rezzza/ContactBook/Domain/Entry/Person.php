<?php

namespace Rezzza\ContactBook\Domain\Entry;

/**
 * Person
 *
 * @uses Entry
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class Person extends Entry
{
    /**
     * @param array $data
     */
    public function create(array $data)
    {
        $this->raise('CreateEntryPerson', $data);
    }
}
