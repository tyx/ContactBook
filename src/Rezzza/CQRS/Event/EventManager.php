<?php

namespace Rezzza\CQRS\Event;

use Rezzza\CQRS\Domain\DomainManager;
use Rezzza\CQRS\Event\VersionControl\VersionControlInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\Event;

/**
 * EventManager
 *
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class EventManager
{
    /**
     * @var DomainManager
     */
    private $domainManager;

    /**
     * @var VersionControlInterface
     */
    private $versionControl;

    /**
     * @var EventDispatcher:
     */
    private $dispatcher;

    /**
     * @param DomainManager           $domainManager  domainManager
     * @param VersionControlInterface $versionControl versionControl
     */
    public function __construct(DomainManager $domainManager, VersionControlInterface $versionControl)
    {
        $this->domainManager  = $domainManager;
        $this->versionControl = $versionControl;
        $this->dispatcher     = new EventDispatcher();
    }

    /**
     * Get events from domains of DomainManager
     * Handle/Store theses events.
     */
    public function flush()
    {
        foreach ($this->domainManager->getDomains() as $domain) {
            foreach ($domain->popEvents() as $event) {
                $this->handleEvent($event);
            }
            $this->domainManager->detach($domain);
        }
    }

    public function handleEvent(DomainEvent $event)
    {
        $this->dispatcher->dispatch($event->getName(), $event);

        // handle events then log event as DONE.
        $this->versionControl->createVersion($event);
    }

    public function addListener($event, \Closure $closure)
    {
        // we have not to restreign to a closure !!!!!!!!!!!!!!!! this is a POC :)
        $this->dispatcher->addListener($event, $closure);
    }
}
