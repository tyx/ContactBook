<?php

namespace Rezzza\CQRS\Event\VersionControl;

use Rezzza\CQRS\Event\DomainEvent;

/**
 * MemoryVersionControl
 *
 * @uses VersionControlInterface
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class MemoryVersionControl implements VersionControlInterface
{
    /**
     * @var array
     */
    private $versions = array();

    /**
     * {@inheritdoc}
     */
    public function createVersion(DomainEvent $event)
    {
        $this->versions[] = array(
            $event->getName(), serialize($event->getProperties())
        );
    }

    /**
     * @return array
     */
    public function getVersions()
    {
        return $this->versions;
    }
}
