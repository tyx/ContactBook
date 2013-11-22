<?php

namespace Rezzza\ContactBook\Domain\Entry;

/**
 * Email
 *
 * @uses Entry
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class Email extends Entry
{
    /**
     * @param array $data
     */
    public function create(array $data)
    {
        $this->raise('CreateEntryEmail', $data);
    }
}
