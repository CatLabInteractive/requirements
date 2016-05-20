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
     * @var Property
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
     * @param Property $property
     * @param Requirement $requirement
     * @param string $message
     */
    public function __construct(Property $property, Requirement $requirement, string $message)
    {
        $this->property = $property;
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