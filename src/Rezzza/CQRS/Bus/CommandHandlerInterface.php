<?php

namespace Rezzza\CQRS\Bus;

use Rezzza\CQRS\Domain\DomainManager;

/**
 * CommandHandlerInterface
 *
 * @author Stephane PY <py.stephane1@gmail.com>
 */
interface CommandHandlerInterface
{
    /**
     * @param object $command command
     *
     * @return boolean
     */
    public function accepts($command);

    /**
     * @param object        $command       command
     * @param DomainManager $domainManager domainManager
     */
    public function handle($command, DomainManager $domainManager);
}
