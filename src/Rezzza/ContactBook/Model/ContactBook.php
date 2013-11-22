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
     * @param string $id       id
     * @param array  $contacts contacts
     * @param array  $groups   groups
     */
    public function __construct($id = null, array $contacts = array(), array $groups = array())
    {
        $this->id = $id;
        $this->contacts = $contacts;
        $this->groups = $groups;

        $this->raise('CreateContactBook', array('id' => $id, 'contacts' => $contacts, 'groups' => $groups));
    }

    /**
     * @param Contact $contact contact
     *
     * @return Group
     */
    public function addContact(Contact $contact)
    {
        $this->contact = $contact;

        $this->raise('ContactBookAddContact', array('id' => $this->getId(), 'contact' => $contact));

        return $this;
    }

    /**
     * @param Group $contact contact
     *
     * @return Group
     */
    public function addGroup(Contact $contact)
    {
        $this->group = $contact;

        $this->raise('ContactBookAddGroup', array('id' => $this->getId(), 'group' => $group));

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
     * @return array<Contact>
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * @return array<Group>
     */
    public function getGroups()
    {
        return $this->groups;
    }
}
