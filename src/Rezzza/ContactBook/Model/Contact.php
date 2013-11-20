<?php

namespace Rezzza\ContactBook\Model;

/**
 * Contact
 *
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class Contact
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var array
     */
    protected $entryTags = array();

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
     * @param string $tag tag
     *
     * @return array<Entry>
     */
    public function getEntries($tag = null)
    {
        $result = array();
        foreach ($this->getEntryTags() as $entryTag) {
            if (null === $tag || $entryTag->getTag() === $tag) {
                $result[] = $entryTag->getEntry();
            }
        }

        return $result;
    }

    /**
     * @param string $tag tag
     *
     * @return Entry|null
     */
    public function getEntry($tag = null)
    {
        foreach ($this->getEntryTags() as $entryTag) {
            if (null === $tag || $entryTag->getTag() === $tag) {
                return $entryTag->getEntry();
            }
        }
    }

    /**
     * @param EntryTag $entryTag entryTag
     *
     * @return Contact
     */
    public function addEntryTag(EntryTag $entryTag)
    {
        $this->entryTags[] = $entryTag;

        return $this;
    }

    public function getEntryTags()
    {
        return $this->entryTags;
    }
}
