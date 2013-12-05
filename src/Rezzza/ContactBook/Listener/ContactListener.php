<?php

namespace Rezzza\ContactBook\Listener;

use Rezzza\DoctrineCQRS\Event\Listener\ORMTransactionalListener;
use Rezzza\CQRS\Event\DomainEvent;
use Rezzza\ContactBook\Model\Contact;

class ContactListener extends ORMTransactionalListener
{
    public function getSubscribedEvents()
    {
        return array('createContact');
    }

    public function createContact(DomainEvent $event)
    {
        $properties    = $event->getProperties();
        $contactBookId = $properties['contact_book_id']->getValue();
        $contactId     = $properties['id']->getValue();

        $em          = $this->getEntityManager();
        $contactBook = $em->getRepository('Rezzza\ContactBook\Model\ContactBook')->find($contactBookId);

        if (!$contactBook) {
            throw new \LogicException(sprintf('Contact "%s" cannot be created because ContactBook "%s" does not exists', $contactId, $contactBookId));
        }

        $contact = new Contact($contactBook, $contactId);

        $em = $this->getEntityManager();
        $em->persist($contact);
        $em->flush();
    }
}
