<?php

namespace CatLab\Requirements;

use CatLab\Requirements\Exceptions\RequirementValidationException;
use CatLab\Requirements\Interfaces\Property;
use CatLab\Requirements\Models\Message;
use CatLab\Requirements\Models\TranslatableMessage;

/**
 * Class Requirement
 * @package CatLab\Requirements\Models
 */
abstract class Requirement implements \CatLab\Requirements\Interfaces\Requirement
{
    /**
     * Return the template that will be used to show an error message.
     * @return string
     */
    abstract public function getTemplate() : string;

    /**
     * Return the values that will be injected in the template.
     * @param Property $property
     * @return array
     */
    abstract public function getTemplateValues(Property $property): array;

    /**
     * @param RequirementValidationException $exception
     * @return Message
     */
    public function getErrorMessage(RequirementValidationException $exception) : Message
    {
        $message = new TranslatableMessage(
            $this->getTemplate(),
            $this->getTemplateValues($exception->getProperty()),
            $exception->getRequirement(),
            $exception->getProperty()->getPropertyName(),
            $exception
        );

        $message->setProvidedValue($exception->getValue());

        return $message;
    }
}
