<?php

namespace CatLab\Requirements;

use CatLab\Requirements\Enums\PropertyType;
use CatLab\Requirements\Exceptions\RequirementValidationException;
use CatLab\Requirements\Interfaces\Property;

/**
 * Class IsMin
 * @package CatLab\Requirements
 */
class IsMin extends Requirement
{
    /**
     * @var int
     */
    private $length;

    /**
     * @var string
     */
    private $template;

    /**
     * IsMin constructor.
     * @param int $length
     */
    public function __construct(int $length)
    {
        $this->length = $length;
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

        if (PropertyType::isNumeric($property->getType())) {
            $this->template = 'Property \'%s\' must have a minimum value of %d.';
            if ($value < $this->length) {
                throw RequirementValidationException::make($property, $this, $value);
            }
        } else {
            $this->template = 'Property \'%s\' must have a minimum length of %d.';
            if (mb_strlen($value) < $this->length) {
                throw RequirementValidationException::make($property, $this, $value);
            }
        }
    }

    /**
     * @return string
     */
    public function getTemplate() : string
    {
        return $this->template;
    }

    /**
     * @param Property $property
     * @return mixed[]
     */
    public function getTemplateValues(Property $property): array
    {
        return [
            $property->getPropertyName(),
            $this->length
        ];
    }
}
