<?php

namespace Rezzza\ContactBook\Storage;

/**
 * StorageInterface
 *
 * @author Stephane PY <py.stephane1@gmail.com>
 */
interface StorageInterface
{
    /**
     * @param object       $object object
     * @param string|array $tag    tag
     *
     * @return array
     */
    public function getContacts($object, $tag = null);

    /**
     * @param object       $contact contact
     * @param object       $object  object
     */
    public function addContact($contact, $object);

    /**
     * @param object $contact contact
     */
    public function updateContact($contact);
}
