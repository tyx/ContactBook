<?php

require __DIR__.'/../vendor/autoload.php';

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Rezzza\CQRS\Bus;
use Rezzza\CQRS\Domain\DomainManager;
use Rezzza\CQRS\Event\EventManager;
use Rezzza\CQRS\Event\VersionControl\MemoryVersionControl;

$modelDirectory = __DIR__.'/../resources/config/doctrine';
$config         = Setup::createXMLMetadataConfiguration(array($modelDirectory), true);
$conn           = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'contactbook',
);
$entityManager = EntityManager::create($conn, $config);

$domainManager = new DomainManager();
$bus = new Bus\MemoryCommandBus($domainManager);

$versionControl = new MemoryVersionControl();
$eventManager = new EventManager($domainManager, $versionControl);
