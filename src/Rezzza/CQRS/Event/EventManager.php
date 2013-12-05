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
     * @var array
     */
    private $sorted = array();

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
    public function addListener(ListenerInterface $listener, $priority = 0)
    {
        foreach ($listener->getSubscribedEvents() as $eventName) {
            $this->listeners[$eventName][$priority][] = $listener;
            unset($this->sorted[$eventName]);
        }
    }

    /**
     * @param string $eventName event
     *
     * @return array<ListenerInterface>
     */
    public function getListeners($eventName)
    {
        if (!isset($this->sorted[$eventName])) {
            $this->sortListeners($eventName);
        }

        return $this->sorted[$eventName];
    }

    /**
     * @param string $eventName eventName
     */
    protected function sortListeners($eventName)
    {
        $this->sorted[$eventName] = array();

        if (isset($this->listeners[$eventName])) {
            krsort($this->listeners[$eventName]);
            $this->sorted[$eventName] = call_user_func_array('array_merge', $this->listeners[$eventName]);
        }
    }
}
