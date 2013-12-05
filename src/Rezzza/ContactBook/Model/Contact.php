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
     * @var ContactBook
     */
    protected $contactBook;

    /**
     * @param ContactBook $contactBook contactBook
     * @param string      $id          id
     * @param array       $entryTags   entryTags
     */
    public function __construct(ContactBook $contactBook, $id, array $entryTags = array())
    {
        $this->contactBook = $contactBook;
        $this->id          = $id;
        $this->entryTags   = $entryTags;
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
     * @return ContactBook
     */
    public function getContactBook()
    {
        return $this->contactBook;
    }
}
