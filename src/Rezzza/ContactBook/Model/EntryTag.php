<?php

namespace Rezzza\ContactBook\Model;

/**
 * EntryTag
 *
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class EntryTag
{
    /**
     * @var Contact
     */
    protected $contact;

    /**
     * @var Entry
     */
    protected $entry;

    /**
     * @var string
     */
    protected $tag;

    /**
     * @param Contact $contact contact
     * @param Entry   $entry   entry
     * @param string  $tag     tag
     */
    public function __construct(Contact $contact, Entry $entry, $tag)
    {
        $this->contact = $contact;
        $this->entry   = $entry;
        $this->tag     = $tag;
    }

    /**
     * @return Contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @return Entry
     */
    public function getEntry()
    {
        return $this->entry;
    }

    /**
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }
}
