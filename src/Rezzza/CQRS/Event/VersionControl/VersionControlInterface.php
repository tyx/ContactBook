<?php

namespace Rezzza\CQRS\Event\VersionControl;

use Rezzza\CQRS\Event\DomainEvent;

interface VersionControlInterface
{
    public function createVersion(DomainEvent $event);
}
