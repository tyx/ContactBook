<?php

namespace Rezzza\ContactBook\Domain\Entry;

/**
 * PhoneNumber
 *
 * @uses Entry
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class PhoneNumber extends Entry
{
    /**
     * @param array $data
     */
    public function create(array $data)
    {
        $this->raise($this->getCreateEventName(), $data);
    }

    /**
     * @return string
     */
    public function getCreateEventName()
    {
        return 'createEntryPhoneNumber';
    }
}
