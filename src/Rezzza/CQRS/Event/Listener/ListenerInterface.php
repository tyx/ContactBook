<?php

namespace Rezzza\CQRS\Event\Listener;

/**
 * ListenerInterface
 *
 * @author Stephane PY <py.stephane1@gmail.com>
 */
interface ListenerInterface
{
    public function getSubscribedEvents();
}
