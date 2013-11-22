<?php

namespace Rezzza\CQRS\Domain;

use Rezzza\CQRS\Event\DomainEvent;

/**
 * DomainManager
 *
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class DomainManager
{
    /**
     * @var array
     */
    protected $domains = array();

    /**
     * @param AggregateRoot $domain domain
     */
    public function attach(AggregateRoot $domain)
    {
        $this->domains[$domain->getId()->getValue()] = $domain;
    }

    /**
     * @param Domain $domain domain
     */
    public function detach(AggregateRoot $domain)
    {
        unset($this->domains[$domain->getId()->getValue()]);
    }

    /**
     * @return array
     */
    public function getDomains()
    {
        return $this->domains;
    }
}
