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
     * @param string $email email
     *
     * @return Email
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}
