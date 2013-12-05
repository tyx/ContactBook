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
        $this->id       = $id;
        $this->contacts = $contacts;
        $this->groups   = $groups;
    }

    public function create($id)
    {
        $this->id = $id;
        $this->raise(new ContactBookCreated(array('id' => $id)));
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
