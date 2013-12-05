<?php

namespace Rezzza\ContactBook\Handler;

use Rezzza\CQRS\Bus\CommandHandlerInterface;
use Rezzza\CQRS\Domain\DomainManager;
use Rezzza\ContactBook\Command\CreateContactBookCommand;
use Rezzza\ContactBook\Model\ContactBook;

class CreateContactBookHandler implements CommandHandlerInterface
{
    public function accepts($command)
    {
        return $command instanceof CreateContactBookCommand;
    }

    public function handle($command, DomainManager $domainManager)
    {
        $contactBook = new ContactBook();
        $contactBook->create($command->getId());

        $domainManager->attach($contactBook);
    }
}
