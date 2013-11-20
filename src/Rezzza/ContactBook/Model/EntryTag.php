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
     *
     * @return EntryTag
     */
    public function setContact(Contact $contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return Contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param Entry $entry entry
     *
     * @return EntryTag
     */
    public function setEntry(Entry $entry)
    {
        $this->entry = $entry;

        return $this;
    }

    /**
     * @return Entry
     */
    public function getEntry()
    {
        return $this->entry;
    }

    /**
     * @param string $tag tag
     *
     * @return EntryTag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

}
