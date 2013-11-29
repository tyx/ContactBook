<?php

namespace Rezzza\CQRS\Event;

use Rezzza\CQRS\Domain\DomainManager;
use Rezzza\CQRS\Event\DomainEvent;
use Rezzza\CQRS\Event\VersionControl\VersionControlInterface;
use Rezzza\CQRS\Event\Listener\TransactionalListenerInterface;
use Rezzza\CQRS\Event\Listener\ListenerInterface;
use Rezzza\CQRS\Transaction\ProcessorCollection as TransactionProcessorCollection;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\Event;
use Rhumsaa\Uuid\Uuid as UuidGenerator;

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
     * @var TransactionProcessorCollection
     */
    private $transactionProcessor;

    /**
     * @var array<ListenerInterface>:
     */
    private $listeners = array();

    /**
     * @param DomainManager           $domainManager  domainManager
     * @param VersionControlInterface $versionControl versionControl
     */
    public function __construct(DomainManager $domainManager, VersionControlInterface $versionControl)
    {
        $this->domainManager        = $domainManager;
        $this->versionControl       = $versionControl;
        $this->transactionProcessor = new TransactionProcessorCollection();
    }

    /**
     * Get events from domains of DomainManager
     * Handle/Store theses events.
     */
    public function flush()
    {
        $aggregateId = (string) UuidGenerator::uuid1();

        $this->registerTransactionProcessors();

        $this->transactionProcessor->beginTransaction($aggregateId);

        try {
            foreach ($this->domainManager->getDomains() as $domain) {
                foreach ($domain->getEvents() as $event) {
                    //@todo handle pre/post with an argument to not create a version for pre/post ?
                    $this->handleEvent(
                        new DomainEvent($event->getName(), $event->getProperties(), $aggregateId)
                    );
                }
                $domain->clearEvents();
            }
            $this->transactionProcessor->commit($aggregateId);
        } catch (\Exception $e) {
            $this->transactionProcessor->rollback($aggregateId);
        }

        $this->domainManager->detach($domain);
        $this->transactionProcessor->clear();
    }

    /**
     * @param DomainEvent $event event
     */
    public function handleEvent(DomainEvent $event)
    {
        if (!isset($this->listeners[$event->getName()])) {
            return;
        }

        foreach ($this->listeners[$event->getName()] as $listener) {
            $listener->{$event->getName()}($event);
        }

        //@todo should i add this in flush method and create many version ?
        $this->versionControl->createVersion($event);
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
     * Add transaction processor inserted in Listener which will be played.
     */
    private function registerTransactionProcessors()
    {
        foreach ($this->domainManager->getDomains() as $domain) {
            foreach ($domain->getEvents() as $event) {
                if (!isset($this->listeners[$event->getName()])) {
                    continue;
                }

                foreach ($this->listeners[$event->getName()] as $listener) {
                    if ($listener instanceof TransactionalListenerInterface) {
                        $this->transactionProcessor->add($listener->getTransactionProcessor());
                    }
                }
            }
        }
    }
}
