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
     * @var array
     */
    private $tmpVersions = array();

    /**
     * {@inheritdoc}
     */
    public function createVersion(DomainEvent $event)
    {
        $this->tmpVersions[] = array(
            $event->getName(), serialize($event->getProperties())
        );
    }

    /**
     * {@inheritdoc}
     */
    public function flush()
    {
        foreach ($this->tmpVersions as $tmpVersion) {
            $this->versions[] = $tmpVersion;
        }

        $this->tmpVersion = array();
    }

    /**
     * @return array
     */
    public function getVersions()
    {
        return $this->versions;
    }
}
