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
     * @param string $civility civility
     *
     * @return Identity
     */
    public function setCivility($civility)
    {
        $this->civility = $civility;

        return $this;
    }

    /**
     * @param string $firstName firstName
     *
     * @return Identity
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @param string $lastName lastName
     *
     * @return Identity
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
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
