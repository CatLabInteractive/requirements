<?php

namespace CatLab\Requirements\Exceptions;
use CatLab\Requirements\Interfaces\Property;
use CatLab\Requirements\Requirement;

/**
 * Class RequirementValidationException
 */
class RequirementValidationException extends RequirementException
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
     * @var mixed
     */
    private $value;

    /**
     * @param Property $property
     * @param Requirement $requirement
     * @param $value
     * @return RequirementValidationException
     */
    public static function make(
        Property $property,
        Requirement $requirement,
        $value
    ) {
        $e = new self(
            'Validation exception for property ' . $property->getPropertyName()
        );

        $e->property = $property;
        $e->requirement = $requirement;
        $e->value = $value;

        return $e;
    }

    /**
     * @return Property
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * @return Requirement
     */
    public function getRequirement()
    {
        return $this->requirement;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}