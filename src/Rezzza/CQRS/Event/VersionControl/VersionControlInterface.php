<?php

namespace Rezzza\CQRS\Event\VersionControl;

use Rezzza\CQRS\Event\DomainEvent;

/**
 * VersionControlInterface
 *
 * @author Stephane PY <py.stephane1@gmail.com>
 */
interface VersionControlInterface
{
    public function createVersion(DomainEvent $event);

    public function flush();
}
