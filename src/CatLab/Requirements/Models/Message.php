<?php

namespace CatLab\Requirements\Models;

use CatLab\Requirements\Interfaces\Requirement;

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
    public function __construct(
        string $message,
        Requirement $requirement = null,
        string $propertyName = null
    ) {
        $this->property = $propertyName;
        $this->requirement = $requirement;
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getPropertyName()
    {
        return $this->property;
    }

    /**
     * @return \CatLab\Requirements\Interfaces\Requirement
     */
    public function getRequirement()
    {
        return $this->requirement;
    }

    /**
     * @return string
     */
    public function getMessage() : string
    {
        return $this->message;
    }

    /**
     * @return string[]
     */
    public function toArray()
    {
        return [
            'property' => $this->property,
            'message' => $this->message
        ];
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->message;
    }
}