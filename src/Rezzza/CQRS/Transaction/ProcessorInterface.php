<?php

namespace Rezzza\CQRS\Transaction;

/**
 * ProcessorInterface
 *
 * @author Stephane PY <py.stephane1@gmail.com>
 */
interface ProcessorInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name name
     */
    public function beginTransaction($name = null);

    /**
     * @param string $name name
     */
    public function rollback($name = null);

    /**
     * @param string $name name
     */
    public function commit($name = null);
}
