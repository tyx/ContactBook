<?php

namespace Rezzza\ContactBook\Domain\Entry;

/**
 * Company
 *
 * @uses Entry
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class Company extends Entry
{
    /**
     * @param array $data
     */
    public function create(array $data)
    {
        $this->raise('CreateEntryCompany', $data);
    }
}
