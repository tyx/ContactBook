<?php

namespace Rezzza\ContactBook\Domain;

use Rezzza\CQRS\Domain\AggregateRoot;

/**
 * Contact
 *
 * @uses AggregateRoot
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class Contact extends AggregateRoot
{
    /**
     * @param array $data
     */
    public function create(array $data)
    {
        $this->raise('CreateContact', $data);
    }

    /**
     * @param array $data data
     */
    public function addEntryTag(array $data)
    {
        $this->raise('ContactAddEntryTag', $data);
    }
}
