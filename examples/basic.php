<?php

require_once __DIR__."/../config/bootstrap.php";

use Rezzza\ContactBook\Domain;
use Rezzza\ContactBook\Model;
use Rezzza\CQRS\Domain\Identity\Uuid;
use Rezzza\CQRS\Bus;
use Rezzza\CQRS\Domain\DomainManager;
use Rezzza\CQRS\Event\EventManager;
use Rezzza\CQRS\Event\DomainEvent;
use Rezzza\CQRS\Event\Listener\TransactionalListenerInterface;
use Rezzza\DoctrineCQRS\Event\Listener\ORMTransactionalListener;

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

class ContactListener Extends ORMTransactionalListener
{
    protected static $i = 0; // to test transactions ...

    public function getSubscribedEvents()
    {
        return array('CreateContact');
    }

    public function CreateContact(DomainEvent $event)
    {
        $properties = $event->getProperties();
        $contact = new Model\Contact($properties['id']->getValue());

        $em = $this->getEntityManager();
        $em->persist($contact);
        $em->flush();


        // to test transactions ...
        /*static::$i++;

        if (static::$i) {
            throw new \Exception('foo');
        }*/
    }
}

/////////////////////////////////////////
// BOOTSTRAP
/////////////////////////////////////////

$bus->addHandler(new AddContactHandler());

// here, we must add listeners to the event dispatcher on $eventManager
$eventManager->addListener(new ContactListener($entityManager));

/////////////////////////////////////////
// CONTROLLER
/////////////////////////////////////////
// $bus = .... get a service.
$bus->handle(new AddContactCommand());
$bus->handle(new AddContactCommand());

// here we have domain with events attached to the manager, this one will play events of theses domains then dettach domains.
$domainManager->flush();
