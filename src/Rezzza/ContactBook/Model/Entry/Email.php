<?php

namespace Rezzza\ContactBook\Model\Entry;

use Rezzza\ContactBook\Model\Entry\Entry;

/**
 * Email
 *
 * @uses Entry
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class Email extends Entry
{
    /**
     * @var float
     */
    protected $email;

    /**
     * @param integer $id    id
     * @param string  $email email
     */
    public function __construct($id, $email)
    {
        $this->id    = $id;
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->emai;
    }
}
