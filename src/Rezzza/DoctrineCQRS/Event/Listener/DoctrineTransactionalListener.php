<?php

namespace Rezzza\DoctrineCQRS\Event\Listener;

use Rezzza\CQRS\Event\Listener\TransactionalListenerInterface;
use Rezzza\DoctrineCQRS\Transaction\DoctrineProcessor;
use Doctrine\ORM\EntityManagerInterface; //@todo use registry

/**
 * DoctrineTransactionalListener
 *
 * @uses TransactionalListenerInterface
 * @author Stephane PY <py.stephane1@gmail.com>
 */
abstract class DoctrineTransactionalListener implements TransactionalListenerInterface
{
    /**
     * @var Connection
     */
    private $entityManager;

    /**
     * @param EntityManagerInterface $entityManager entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return EntityManagerInterface
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * {@inheritdoc}
     */
    public function getTransactionProcessor()
    {
        return new DoctrineProcessor($this->getEntityManager()->getConnection());
    }
}
