<?php

namespace Rezzza\ContactBook\Command;

use Rezzza\CQRS\Domain\Identity\Uuid;

/**
 * CreateContactCommand
 *
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class CreateContactCommand
{
    private $contactBookId;

    private $id;

    public function __construct($contactBookId, $id = null)
    {
        $this->contactBookId = $contactBookId;
        $this->id            = $id ?: Uuid::generate();
    }

    public function getContactBookId()
    {
        return $this->contactBookId;
    }

    public function getId()
    {
        return $this->id;
    }
}
