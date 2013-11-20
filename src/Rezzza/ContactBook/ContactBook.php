<?php

namespace Rezzza\ContactBook;

use Rezzza\ContactBook\Storage\StorageInterface;
use Doctrine\Common\Util\ClassUtils;

/**
 * ContactBook
 *
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class ContactBook
{
    /**
     * @var StorageInterface
     */
    protected $storage;

    /**
     * @param StorageInterface $storage storage
     */
    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    /**
     * @param object       $object object
     * @param string|array $tag    tag
     *
     * @return array
     */
    public function getContacts($object, $tag = null)
    {
        return $this->storage->getContacts($object, $tag);
    }

    /**
     * @param object       $contact contact
     * @param object       $object  object
     */
    public function addContact($contact, $object)
    {
        return $this->storage->addContact($contact, $object);
    }

    /**
     * @param object $contact contact
     */
    public function updateContact($contact)
    {
        return $this->storage->updateContact($contact);
    }
}
