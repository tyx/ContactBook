<?php

namespace Rezzza\ContactBook\Domain\Entry;

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
        return 'CreateEntryMobileNumber';
    }
}
