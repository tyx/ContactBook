<?php

namespace Rezzza\CQRS\Event\Listener;

/**
 * ListenerInterface
 *
 * @todo add priority system
 *
 * @author Stephane PY <py.stephane1@gmail.com>
 */
interface ListenerInterface
{
    public function getSubscribedEvents();
}
