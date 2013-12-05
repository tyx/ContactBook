<?php

namespace Rezzza\ContactBook\Handler;

use Rezzza\CQRS\Bus\CommandHandlerInterface;
use Rezzza\CQRS\Domain\DomainManager;
use Rezzza\ContactBook\Command\CreateContactBookCommand;
use Rezzza\ContactBook\Domain\ContactBook;

class CreateContactBookHandler implements CommandHandlerInterface
{
    public function accepts($command)
    {
        return $command instanceof CreateContactBookCommand;
    }

    public function handle($command, DomainManager $domainManager)
    {
        $contactBook = new ContactBook($command->getId());
        $contactBook->create();

        $domainManager->attach($contactBook);
    }
}
