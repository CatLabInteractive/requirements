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
     * @param Property $property
     * @param $value
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

    /**
     * Return the allowed values
     * @return mixed[]
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @return string
     */
    public function getValueString(): string
    {
        $values = implode(', ', $this->getValues());
        return '[ ' . $values . ' ]';
    }

    /**
     * @return string
     */
    public function getTemplate() : string
    {
        return 'Property \'%s\' must be in %s.';
    }

    /**
     * @param Property $property
     * @return array
     */
    public function getTemplateValues(Property $property): array
    {
        return [
            $property->getPropertyName(),
            $this->getValueString()
        ];
    }
}
