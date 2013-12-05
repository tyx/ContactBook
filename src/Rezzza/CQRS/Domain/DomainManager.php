<?php

namespace Rezzza\CQRS\Domain;

use Rezzza\CQRS\Event\DomainEvent;
use Rezzza\CQRS\Event\EventManager;
use Rezzza\CQRS\Event\Listener\TransactionalListenerInterface;
use Rezzza\CQRS\Transaction\ProcessorCollection as TransactionProcessorCollection;
use Rhumsaa\Uuid\Uuid as UuidGenerator;

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
    private $domains = array();

    /**
     * @var EventManager
     */
    private $eventManager;

    /**
     * @var TransactionProcessorCollection
     */
    private $transactionProcessor;

    /**
     * @param EventManager $eventManager eventManager
     */
    public function __construct(EventManager $eventManager)
    {
        $this->eventManager         = $eventManager;
        $this->transactionProcessor = new TransactionProcessorCollection();
    }

    /**
     * Flush domains attached.
     */
    public function flush()
    {
        $this->prepareTransactionProcessors();

        $aggregateId = (string) UuidGenerator::uuid1();

        $this->transactionProcessor->beginTransaction($aggregateId);

        try {
            foreach ($this->getDomains() as $domain) {
                foreach ($domain->getEvents() as $event) {
                    $this->eventManager->handleEvent(
                        new DomainEvent($event->getName(), $event->getProperties(), $aggregateId)
                    );
                }
                $domain->clearEvents();

                $this->detach($domain);
            }
            $this->transactionProcessor->commit($aggregateId);
        } catch (\Exception $e) {
            $this->transactionProcessor->rollback($aggregateId);
            throw $e;
        }

        $this->eventManager->flushVersions();
        $this->transactionProcessor->clear();
    }

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

    /**
     * Add transaction processor inserted in Listener which will be played.
     */
    private function prepareTransactionProcessors()
    {
        foreach ($this->getDomains() as $domain) {
            foreach ($domain->getEvents() as $event) {
                $listeners = $this->eventManager->getListeners($event->getName());

                foreach ($listeners as $listener) {
                    if ($listener instanceof TransactionalListenerInterface) {
                        $this->transactionProcessor->add($listener->getTransactionProcessor());
                    }
                }
            }
        }
    }

}
