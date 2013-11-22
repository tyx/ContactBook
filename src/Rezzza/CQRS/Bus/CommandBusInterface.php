<?php

namespace Rezzza\CQRS\Bus;

/**
 * CommandBusInterface
 *
 * @author Stephane PY <py.stephane1@gmail.com>
 */
interface CommandBusInterface
{
    /**
     * @param object $command command
     */
    public function handle($command);
}
