<?php

namespace Rezzza\CQRS\Model;

/**
 * AggregateRoot
 *
 * @author Stephane PY <py.stephane1@gmail.com>
 */
abstract class AggregateRoot
{
    /**
     * @var array
     */
    private $events = array();

    /**
     * @param string $eventName  eventName
     * @param array  $properties properties
     */
    public function raise($eventName, array $properties)
    {
        $this->events[] = new DomainEvent($eventName, $properties);
    }

    /**
     * @return array<DomainEvent>
     */
    public function popEvents()
    {
        $events = $this->events;
        $this->events = array();

        return $events;
    }
}
