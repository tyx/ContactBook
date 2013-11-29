<?php

namespace Rezzza\CQRS\Transaction;

/**
 * ProcessorCollection
 *
 * @uses ProcessorInterface
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class ProcessorCollection implements ProcessorInterface
{
    /**
     * @var array
     */
    private $processors = array();

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'collection';
    }

    /**
     * @param ProcessorInterface $processor processor
     */
    public function add(ProcessorInterface $processor)
    {
        $this->processors[$processor->getName()] = $processor;
    }

    /**
     * clear processors list
     */
    public function clear()
    {
        $this->processors = array();
    }

    /**
     * {@inheritdoc}
     */
    public function beginTransaction($name = null)
    {
        foreach ($this->processors as $processor) {
            $processor->beginTransaction($name);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function rollback($name = null)
    {
        foreach ($this->processors as $processor) {
            $processor->rollback($name);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function commit($name = null)
    {
        foreach ($this->processors as $processor) {
            $processor->commit($name);
        }
    }
}
