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
     * @param integer $id          id
     * @param string  $phoneNumber phoneNumber
     */
    public function __construct($id, $phoneNumber)
    {
        $this->id          = $id;
        $this->phoneNumber = $phoneNumber;

        $this->raise($this->getCreateEventName(), array('id' => $id, 'phoneNumber' => $phoneNumber));
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @return string
     */
    public function getCreateEventName()
    {
        return 'CreateEntryPhoneNumber';
    }
}
