<?php

namespace Rezzza\ContactBook\Model;

/**
 * Group
 *
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class Group
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var ContactBook
     */
    protected $contactBook;

    /**
     * @var array
     */
    protected $contacts = array();

    /**
     * @param ContactBook $contactBook contactBook
     * @param string      $id          id
     * @param array       $contacts    contacts
     */
    public function __construct(ContactBook $contactBook, $id = null, array $contacts = array())
    {
        $this->contactBook = $contactBook;
        $this->id          = $id;
        $this->contacts    = $contacts;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return ContactBook
     */
    public function getContactBook()
    {
        return $this->contactBook;
    }

    /**
     * @return array<Contact>
     */
    public function getContacts()
    {
        return $this->contacts;
    }
}
