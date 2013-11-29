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
     * @var string
     */
    private $aggregateId;

    /**
     * @var integer
     */
    private $version;

    /**
     * @var array
     */
    private $properties;

    /**
     * @param string $name        name
     * @param array  $properties  properties
     * @param string $aggregateId aggregateId
     */
    public function __construct($name, array $properties, $aggregateId = null)
    {
        $this->name        = $name;
        $this->properties  = $properties;
        $this->aggregateId = $aggregateId;
    }

    /**
     * @param integer $version version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * @return integer
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getAggregateId()
    {
        return $this->aggregateId;
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
        return array('name', 'aggregateId', 'properties');
    }
}
