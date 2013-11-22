<?php

namespace Rezzza\ContactBook\Model\Entry;

use Rezzza\ContactBook\Model\Entry\Entry;

/**
 * Person
 *
 * @uses Entry
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class Person extends Entry
{
    /**
     * @var string
     */
    protected $civility;

    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * @param integer $id        id
     * @param string  $civility  civility
     * @param string  $firstName firstName
     * @param string  $lastName  lastName
     */
    public function __construct($id, $civility, $firstName, $lastName)
    {
        $this->id        = $id;
        $this->civility  = $civility;
        $this->firstName = $firstName;
        $this->lastName  = $lastName;

        $this->raise('CreateEntryPerson', array(
            'id'        => $id,
            'civility'  => $civility,
            'firstName' => $firstName,
            'lastName'  => $lastName,
        ));
    }

    /**
     * @return string
     */
    public function getCivility()
    {
        return $this->civility;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

}
