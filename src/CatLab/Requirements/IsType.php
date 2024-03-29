<?php

namespace CatLab\Requirements;

use CatLab\Requirements\Enums\PropertyType;
use CatLab\Requirements\Exceptions\RequirementValidationException;
use CatLab\Requirements\Interfaces\Property;

/**
 * Class IsType
 * @package CatLab\Requirements
 */
class IsType extends Requirement
{
    /**
     * @var string
     */
    private $type;

    /**
     * IsType constructor.
     * @param string $type
     */
    public function __construct(string $type)
    {
        $this->type = $type;
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

        switch ($this->type) {
            case PropertyType::INTEGER:
                $check = is_int($value);
                break;

            case PropertyType::DATETIME:
                $check = $value instanceof \DateTime;
                break;

            case PropertyType::NUMBER:
                $check = is_numeric($value);
                break;

            case PropertyType::STRING:
                $check = is_string($value);
                break;

            case PropertyType::OBJECT:
                $check = is_array($value) || is_object($value);
                break;

            case PropertyType::BOOL:
                $check = is_bool($value);
                break;

            default:
                throw RequirementValidationException::make($property, $this, $value);
                break;
        }

        if (!$check) {
            throw RequirementValidationException::make($property, $this, $value);
        }
    }

    /**
     * @return string
     */
    public function getTemplate() : string
    {
        return 'Property \'%s\' must be of type %s.';
    }

    /**
     * @param Property $property
     * @return mixed[]
     */
    public function getTemplateValues(Property $property): array
    {
        return [
            $property->getPropertyName(),
            $this->type
        ];
    }
}
