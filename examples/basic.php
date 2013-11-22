<?php

require __DIR__.'/../vendor/autoload.php';

use Rezzza\ContactBook\Domain;
use Rezzza\ContactBook\Model;
use Rezzza\CQRS\Model\Identity\Uuid;
use Rezzza\CQRS\Bus;
use Rezzza\CQRS\Domain\DomainManager;
use Rezzza\CQRS\Event\EventManager;
use Rezzza\CQRS\Event\DomainEvent;

class AddContactCommand
{
    private $id;

    public function __construct($id = null)
    {
        $this->id = $id ?: Uuid::generate();
    }

    public function getId()
    {
        return $this->id;
    }
}

class AddContactHandler implements Bus\CommandHandlerInterface
{
    public function accepts($command)
    {
        return is_object($command) && $command instanceof \AddContactCommand;
    }

    public function handle($command, DomainManager $domainManager)
    {
        $contact = new Domain\Contact($command->getId());
        $contact->create();

        $domainManager->attach($contact);
    }
}

// done in bootstrap of the application.
$domainManager = new DomainManager();
$bus = new Bus\MemoryCommandBus($domainManager);
$bus->addHandler(new AddContactHandler());

$versionControl = new \Rezzza\CQRS\Event\VersionControl\MemoryVersionControl();

$eventManager = new EventManager($domainManager, $versionControl);

// here, we must add listeners to the event dispatcher on $eventManager
$eventManager->addListener('CreateContact', function(DomainEvent $event) {
    echo "listener 1";
    // here we inject in database value ...
});

$eventManager->addListener('CreateContact', function(DomainEvent $event) {
    echo "listener 2";
    // here we send a mail ...
});


// our controller ....
// $bus = .... get a service.
$bus->handle(new AddContactCommand());

// here we have domain with events attached to the manager, this one will play events of theses domains then dettach domains.
$eventManager->flush();

print "<pre>";
var_dump($versionControl->getVersions());
print "</pre>";

//Il manque clairement:
//
// - AggregateId system (définition + transaction quand on execute un ensemble d'event sur un domain)
// - Un vrai VCS
// - Event listeners bien moisis (tu vas voir)
