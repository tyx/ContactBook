<?php

namespace Rezzza\DoctrineCQRS\Transaction;

use Rezzza\CQRS\Transaction\ProcessorInterface;
use Doctrine\DBAL\Connection;

/**
 * DoctrineProcessor
 *
 * @uses ProcessorInterface
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class DoctrineProcessor implements ProcessorInterface
{
    /**
     * @var Connection
     */
    private $conn;

    /**
     * @param Connection $conn conn
     */
    public function __construct(Connection $conn)
    {
        $this->conn = $conn;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'doctrine';
    }

    /**
     * {@inheritdoc}
     */
    public function beginTransaction($name = null)
    {
        $this->conn->beginTransaction($name);
    }

    /**
     * {@inheritdoc}
     */
    public function rollback($name = null)
    {
        $this->conn->rollback($name);
    }

    /**
     * {@inheritdoc}
     */
    public function commit($name = null)
    {
        $this->conn->commit($name);
    }
}
