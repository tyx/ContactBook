<?php

namespace Rezzza\CQRS\Event;

use Symfony\Component\EventDispatcher\Event;

/**
 * DomainEvent
 *
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class DomainEvent extends Event
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $properties;

    /**
     * @param string $name       name
     * @param array  $properties properties
     */
    public function __construct($name, array $properties)
    {
        $this->name       = $name;
        $this->properties = $properties;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * @return array
     */
    public function __sleep()
    {
        return array('name', 'properties');
    }
}
