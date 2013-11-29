<?php

namespace Rezzza\CQRS\Domain\Identity;

/**
 * Uuid
 *
 * @uses IdentityInterface
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class Uuid implements IdentityInterface
{
    /**
     * @var string
     */
    private $value;

    /**
     * @param string $value value
     */
    public function __construct($value)
    {
        $this->value = (string) $value;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param int   $version version
     * @param array $data    data
     */
    public static function generate($version = 1, array $data = array())
    {
        switch ($version) {
            case 1:
            case 4:
                // clear data
                $data = array();
                break;
            case 3:
            case 5:
                // keep data as it is.
                break;
            default:
                throw new \InvalidArgumentException('Unknown version, use version (1|3|4|5).');
                break;
        }

        $method = sprintf('uuid%s', $version);
        $object = call_user_func_array(array('Rhumsaa\Uuid\Uuid', $method), $data);

        return new static((string) $object);
    }
}
