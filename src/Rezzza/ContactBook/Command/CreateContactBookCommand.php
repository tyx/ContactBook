<?php

namespace Rezzza\ContactBook\Command;

use Rezzza\CQRS\Domain\Identity\Uuid;

/**
 * CreateContactBookCommand
 *
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class CreateContactBookCommand
{
    private $id;

    public function __construct($id = null)
    {
        $this->id = $id ?: Uuid::generate();
    }

    public function getId()
    {
        return $this->id;
    }
}
