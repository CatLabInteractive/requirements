<?php

namespace CatLab\Requirements\Models;

use CatLab\Requirements\Interfaces\Property;
use CatLab\Requirements\Requirement;

/**
 * Class Message
 * @package CatLab\Requirements\Models
 */
class Message
{
    /**
     * @var string
     */
    private $property;

    /**
     * @var Requirement
     */
    private $requirement;

    /**
     * @var string
     */
    private $message;

    /**
     * Message constructor.
     * @param Requirement $requirement
     * @param string $propertyName
     * @param string $message
     */
    public function __construct(Requirement $requirement, string $propertyName, string $message)
    {
        $this->property = $propertyName;
        $this->requirement = $requirement;
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->message;
    }
}