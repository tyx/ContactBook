<?php

namespace Rezzza\ContactBook\Domain;

use Rezzza\CQRS\Domain\AggregateRoot;

/**
 * Group
 *
 * @uses AggregateRoot
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class Group extends AggregateRoot
{
    /**
     * @param array $data
     */
    public function create(array $data)
    {
        $this->raise('CreateGroup', $data);
    }

    /**
     * @param array $data
     */
    public function addContact(array $data)
    {
        $this->raise('GroupAddContact', $data);
    }
}
