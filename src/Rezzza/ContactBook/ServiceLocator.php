<?php

namespace Rezzza\ContactBook;

use Rezzza\ContactBook\Handler;
use Rezzza\ContactBook\Listener;

/**
 * ServiceLocator
 *
 * @author Stephane PY <py.stephane1@gmail.com>
 */
abstract class ServiceLocator
{
    /**
     * @param \Doctrine\ORM\EntityManager $entityManager entityManager
     *
     * @return \Pimple
     */
    public static function build(\Doctrine\ORM\EntityManager $entityManager)
    {
        $c = new \Pimple();

        $c['version.control.memory.class'] = 'Rezzza\CQRS\Event\VersionControl\MemoryVersionControl';
        $c['event.manager.class'] = 'Rezzza\CQRS\Event\EventManager';
        $c['domain.manager.class'] = 'Rezzza\CQRS\Domain\DomainManager';
        $c['memory.command.bus.class'] = 'Rezzza\CQRS\Bus\MemoryCommandBus';

        $c['event.manager'] = $c->share(function($c) use ($entityManager) {
            $eventManager = new $c['event.manager.class']($c['version.control']);
            $eventManager->addListener(new Listener\ContactBookListener($entityManager));
            $eventManager->addListener(new Listener\ContactListener($entityManager));

            return $eventManager;
        });

        $c['domain.manager'] = $c->share(function($c) {
            return new $c['domain.manager.class']($c['event.manager']);
        });

        $c['version.control.memory'] = $c->share(function($c) {
            return new $c['version.control.memory.class'];
        });

        // alias
        $c['version.control'] = $c['version.control.memory'];

        $c['memory.command.bus'] = $c->share(function($c) {
            $bus = new $c['memory.command.bus.class']($c['domain.manager']);
            $bus->addHandler(new Handler\CreateContactBookHandler());
            $bus->addHandler(new Handler\CreateContactHandler());

            return $bus;
        });

        // alias
        $c['command.bus'] = $c['memory.command.bus'];

        return $c;
    }
}
