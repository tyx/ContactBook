<?php

namespace Rezzza\CQRS\Event\Listener;

use Rezzza\CQRS\Transaction\ProcessorInterface;

/**
 * TransactionalListenerInterface
 *
 * @uses ListenerInterface
 * @author Stephane PY <py.stephane1@gmail.com>
 */
interface TransactionalListenerInterface extends ListenerInterface
{
    /**
     * @return ProcessorInterface
     */
    public function getTransactionProcessor();
}
