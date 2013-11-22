<?php

namespace Rezzza\ContactBook\Model;

use Rezzza\CQRS\Model\AggregateRoot;

/**
 * Contact
 *
 * @uses AggregateRoot
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class Contact extends AggregateRoot
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
     * @param string $id        id
     * @param array  $entryTags entryTags
     */
    public function __construct($id = null, array $entryTags = array())
    {
        $this->id = $id;
        $this->entryTags = $entryTags;

        $this->raise('CreateContact', array('id' => $id, 'entryTags' => $entryTags));
    }

    /**
     * @param EntryTag $entryTag entryTag
     *
     * @return Contact
     */
    public function addEntryTag(EntryTag $entryTag)
    {
        $this->entryTags[] = $entryTag;

        $this->raise('ContactAddEntryTag', array('id' => $this->getId(), 'entryTag' => $entryTag));

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
        foreach ($this->entryTags as $entryTag) {
            if (null === $tag || $entryTag->getTag() === $tag) {
                $result[] = $entryTag->getEntry();
            }
        }

        return $result;
    }

    /**
     * __sleep method for serialization.
     */
    public function __sleep()
    {
        return array('id', 'entryTags');
    }
}
