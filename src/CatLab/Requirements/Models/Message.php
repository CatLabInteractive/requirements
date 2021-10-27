<?php

namespace CatLab\Requirements\Models;

use CatLab\Requirements\Exceptions\RequirementValidationException;
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
     * @var mixed
     */
    private $providedValue;

    /**
     * @var RequirementValidationException
     */
    private $validationException;

    /**
     * Message constructor.
     * @param string $message
     * @param Requirement|null $requirement
     * @param string|null $propertyName
     * @param RequirementValidationException|null $validationException
     */
    public function __construct(
        string $message,
        Requirement $requirement = null,
        string $propertyName = null,
        RequirementValidationException $validationException = null
    ) {
        $this->property = $propertyName;
        $this->requirement = $requirement;
        $this->message = $message;
        $this->validationException = $validationException;
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
            'message' => $this->getMessage()
        ];
    }

    /**
     * @param $value
     * @return Message
     */
    public function setProvidedValue($value): Message
    {
        $this->providedValue = $value;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProvidedValue()
    {
        return $this->providedValue;
    }

    /**
     * @return RequirementValidationException|null
     */
    public function getValidationException()
    {
        return $this->validationException;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getMessage();
    }
}
