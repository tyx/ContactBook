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
     * @param string $companyName companyName
     *
     * @return Identity
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }
}
