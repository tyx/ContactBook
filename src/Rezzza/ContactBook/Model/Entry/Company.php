<?php

namespace Rezzza\ContactBook\Model\Entry;

use Rezzza\ContactBook\Model\Entry\Entry;

/**
 * Company
 *
 * @uses Entry
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class Company extends Entry
{
    /**
     * @var string
     */
    protected $companyName;

    /**
     * @param integer $id          id
     * @param string  $companyName companyName
     */
    public function __construct($id, $companyName)
    {
        $this->id          = $id;
        $this->companyName = $companyName;

        $this->raise('CreateEntryCompany', array('id' => $id, 'companyName' => $companyName));
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }
}
