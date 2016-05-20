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
     * @var string
     */
    private $length;

    /**
     * IsMin constructor.
     * @param int $length
     */
    public function __construct(int $length)
    {
        $this->length = $length;
    }

    /**
     * @return string
     */
    function getTemplate() : string
    {
        return '%s must have a minimum length of ' . $this->length;
    }

    /**
     * @param Property $property
     * @param $value
     * @return mixed
     * @throws RequirementValidationException
     */
    public function validate(Property $property, $value)
    {
        if (PropertyType::isNumeric($property->getType())) {
            if ($value > $this->length) {
                throw RequirementValidationException::make($property, $this, $value);
            }
        } else {
            if (mb_strlen($value) < $this->length) {
                throw RequirementValidationException::make($property, $this, $value);
            }
        }
    }
}