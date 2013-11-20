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
     * @param ContactBook $contactBook contactBook
     *
     * @return Group
     */
    public function setContactBook(ContactBook $contactBook)
    {
        $this->contactBook = $contactBook;

        return $this;
    }

    /**
     * @return ContactBook
     */
    public function getContactBook()
    {
        return $this->contactBook;
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
}
