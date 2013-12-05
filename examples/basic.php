<?php

require_once __DIR__."/../config/bootstrap.php";

$container = \Rezzza\ContactBook\ServiceLocator::build($entityManager);

$contactBookId = \Rezzza\CQRS\Domain\Identity\Uuid::generate();

$bus = $container['command.bus'];

$bus->handle(new \Rezzza\ContactBook\Command\CreateContactBookCommand($contactBookId));
$bus->handle(new \Rezzza\ContactBook\Command\CreateContactCommand($contactBookId));

// here we have domain with events attached to the manager, this one will play events of theses domains then dettach domains.
$container['domain.manager']->flush();
