<?php


namespace CatLab\Requirements;

use CatLab\Requirements\Exceptions\RequirementValidationException;
use CatLab\Requirements\Interfaces\Property;

/**
 * Class Exists
 * @package CatLab\Requirements
 */
class Exists extends Requirement
{
    /**
     * @param Property $property
     * @param $value
     * @throws RequirementValidationException
     * @return void
     */
    public function validate(Property $property, $value)
    {
        if (!isset($value)) {
            throw RequirementValidationException::make($property, $this, $value);
        }
    }

    /**
     * @return string
     */
    public function getTemplate() : string
    {
        return 'Property \'%s\' must exist.';
    }

    /**
     * @param Property $property
     * @return array
     */
    public function getTemplateValues(Property $property): array
    {
        return [
            $property->getPropertyName()
        ];
    }
}
