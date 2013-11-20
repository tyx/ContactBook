<?php

namespace Rezzza\ContactBook\Model;

/**
 * ContactBook
 *
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class ContactBook
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var array
     */
    protected $contacts = array();

    /**
     * @var array
     */
    protected $groups = array();

    /**
     * @param integer $id id
     *
     * @return Group
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param Contact $contact contact
     *
     * @return Group
     */
    public function addContact(Contact $contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return array<Contact>
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * @param Group $contact contact
     *
     * @return Group
     */
    public function addGroup(Contact $contact)
    {
        $this->group = $contact;

        return $this;
    }

    /**
     * @return array<Group>
     */
    public function getGroups()
    {
        return $this->groups;
    }
}
