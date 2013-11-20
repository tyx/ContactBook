<?php

namespace Rezzza\ContactBook\Model\Entry;

use Rezzza\ContactBook\Model\Entry\Entry;

/**
 * PhoneNumber
 *
 * @uses Entry
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class PhoneNumber extends Entry
{
    /**
     * @var string
     */
    protected $phoneNumber;

    /**
     * @param string $phoneNumber phoneNumber
     *
     * @return PhoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
}
