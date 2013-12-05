<?php

namespace Rezzza\ContactBook\Handler;

use Rezzza\CQRS\Bus\CommandHandlerInterface;
use Rezzza\CQRS\Domain\DomainManager;
use Rezzza\ContactBook\Command\CreateContactCommand;
use Rezzza\ContactBook\Domain\Contact;

class CreateContactHandler implements CommandHandlerInterface
{
    public function accepts($command)
    {
        return $command instanceof CreateContactCommand;
    }

    public function handle($command, DomainManager $domainManager)
    {
        $contact = new Contact($command->getId());
        $contact->create(array('contact_book_id' => $command->getContactBookId()));

        $domainManager->attach($contact);
    }
}
