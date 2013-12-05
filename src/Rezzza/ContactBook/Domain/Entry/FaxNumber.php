<?php

namespace Rezzza\ContactBook\Domain\Entry;

use Rezzza\ContactBook\Model\Entry\Entry;

/**
 * FaxNumber
 *
 * @uses PhoneNumber
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class FaxNumber extends PhoneNumber
{
    /**
     * @return string
     */
    public function getCreateEventName()
    {
        return 'createEntryFaxNumber';
    }
}
