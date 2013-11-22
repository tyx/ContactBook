<?php

namespace Rezzza\ContactBook\Domain;

use Rezzza\CQRS\Domain\AggregateRoot;

/**
 * ContactBook
 *
 * @uses AggregateRoot
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class ContactBook extends AggregateRoot
{
    /**
     * @param array $data
     */
    public function create(array $data)
    {
        $this->raise('CreateContactBook', $data);
    }

    /**
     * @param array $data
     */
    public function addContact(array $data)
    {
        $this->raise('ContactBookAddContact', $data);
    }

    /**
     * @param array $data
     */
    public function addGroup(array $data)
    {
        $this->raise('ContactBookAddGroup', $data);
    }
}
