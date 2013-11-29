<?php

namespace Rezzza\CQRS\Domain;

use Rezzza\CQRS\Domain\Identity\IdentityInterface;
use Rezzza\CQRS\Event\DomainEvent;

/**
 * AggregateRoot
 *
 * @author Stephane PY <py.stephane1@gmail.com>
 */
abstract class AggregateRoot
{
    /**
     * Is this class already exists ?
     *
     * @var IdentityInterface
     */
    private $id;

    /**
     * @var array
     */
    private $events = array();

    /**
     * @param IdentityInterface $id id
     */
    public function __construct(IdentityInterface $id)
    {
        $this->id = $id;
    }

    /**
     * @param string $eventName  eventName
     * @param array  $properties properties
     */
    public function raise($eventName, array $properties)
    {
        $properties = array_merge(array('id' => $this->getId()), $properties);

        $this->events[] = new DomainEvent($eventName, $properties);
    }

    /**
     * @return array<DomainEvent>
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * @return array<DomainEvent>
     */
    public function clearEvents()
    {
        $this->events = array();
    }

    /**
     * @return IdentityInterface
     */
    public function getId()
    {
        return $this->id;
    }
}
