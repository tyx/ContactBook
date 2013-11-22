<?php

namespace Rezzza\CQRS\Bus;

use Rezzza\CQRS\Domain\DomainManager;

/**
 * MemoryCommandBus
 *
 * @uses CommandBusInterface
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class MemoryCommandBus implements CommandBusInterface
{
    /**
     * @var array
     */
    private $handlers = array();

    /**
     * @var DomainManager
     */
    private $domainManager;

    /**
     * @param DomainManager $domainManager domainManager
     */
    public function __construct(DomainManager $domainManager)
    {
        $this->domainManager = $domainManager;
    }

    /**
     * @param CommandHandlerInterface $handler handler
     */
    public function addHandler(CommandHandlerInterface $handler)
    {
        $this->handlers[] = $handler;
    }

    /**
     * @param object $command command
     */
    public function handle($command)
    {
        foreach ($this->handlers as $handler) {
            if ($handler->accepts($command)) {
                $handler->handle($command, $this->domainManager);
            }
        }
    }
}
