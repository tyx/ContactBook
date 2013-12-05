<?php

namespace Rezzza\CQRS\Event;

use Rezzza\CQRS\Event\DomainEvent;
use Rezzza\CQRS\Event\VersionControl\VersionControlInterface;
use Rezzza\CQRS\Event\Listener\ListenerInterface;

/**
 * EventManager
 *
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class EventManager
{
    /**
     * @var VersionControlInterface
     */
    private $versionControl;

    /**
     * @var array<ListenerInterface>:
     */
    private $listeners = array();

    /**
     * @param VersionControlInterface $versionControl versionControl
     */
    public function __construct(VersionControlInterface $versionControl)
    {
        $this->versionControl       = $versionControl;
    }

    /**
     * @param DomainEvent $event event
     */
    public function handleEvent(DomainEvent $event)
    {
        $listeners = $this->getListeners($event->getName());
        if (empty($listeners)) {
            return;
        }

        foreach ($listeners as $listener) {
            $listener->{$event->getName()}($event);
        }

        $this->versionControl->createVersion($event);
    }

    /**
     * Flush versions in versionControl system.
     */
    public function flushVersions()
    {
        $this->versionControl->flush();
    }

    /**
     * @param ListenerInterface $listener listener
     */
    public function addListener(ListenerInterface $listener)
    {
        foreach ($listener->getSubscribedEvents() as $event) {
            $this->listeners[$event][] = $listener;
        }
    }

    /**
     * @param string $event event
     *
     * @return array<ListenerInterface>
     */
    public function getListeners($event)
    {
        return $this->listeners[$event];
    }
}
