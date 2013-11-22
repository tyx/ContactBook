<?php

namespace Rezzza\ContactBook\Model\Entry;

use Rezzza\ContactBook\Model\Entry\Entry;

/**
 * MobilePhoneNumber
 *
 * @uses PhoneNumber
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class MobilePhoneNumber extends PhoneNumber
{
    /**
     * @return string
     */
    public function getCreateEventName()
    {
        return 'CreateEntryFaxNumber';
    }
}
