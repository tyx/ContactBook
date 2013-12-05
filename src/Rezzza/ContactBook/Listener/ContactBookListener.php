<?php

namespace Rezzza\ContactBook\Listener;

use Rezzza\DoctrineCQRS\Event\Listener\ORMTransactionalListener;
use Rezzza\CQRS\Event\DomainEvent;
use Rezzza\ContactBook\Model\ContactBook;

class ContactBookListener extends ORMTransactionalListener
{
    public function getSubscribedEvents()
    {
        return array('createContactBook');
    }

    public function createContactBook(DomainEvent $event)
    {
        $properties  = $event->getProperties();
        $contactBook = new ContactBook($properties['id']->getValue());

        $em = $this->getEntityManager();
        $em->persist($contactBook);
        $em->flush();
    }
}
