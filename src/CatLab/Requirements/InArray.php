<?php

namespace CatLab\Requirements;

use CatLab\Requirements\Exceptions\RequirementValidationException;
use CatLab\Requirements\Interfaces\Property;

/**
 * Class InArray
 * @package CatLab\Requirements
 */
class InArray extends Requirement
{
    /**
     * @var mixed[]
     */
    private $values;

    /**
     * InArray constructor.
     * @param array $values
     */
    public function __construct(array $values)
    {
        $this->values = $values;
    }

    /**
     * Return the allowed values
     * @return mixed[]
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @return string
     */
    function getTemplate() : string
    {
        return 'Property \'%s\' must be in ' . implode(', ', $this->values) . '.';
    }

    /**
     * @param Property $property
     * @param $value
     * @return mixed
     * @throws RequirementValidationException
     */
    public function validate(Property $property, $value)
    {
        if ($value === null) {
            return;
        }

        if (!in_array((string)$value, $this->values))  {
            throw RequirementValidationException::make($property, $this, $value);
        }
    }
}