<?php

namespace Rezzza\ContactBook\Domain;

use Rezzza\CQRS\Domain\AggregateRoot;

/**
 * EntryTag
 *
 * @uses AggregateRoot
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class EntryTag extends AggregateRoot
{
    /**
     * @param array $data
     */
    public function create(array $data)
    {
        $this->raise('CreateEntryTag', $data);
    }
}
