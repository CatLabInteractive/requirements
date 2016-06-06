<?php

namespace CatLab\Requirements;

use CatLab\Requirements\Exceptions\RequirementValidationException;
use CatLab\Requirements\Models\Message;

/**
 * Class Requirement
 * @package CatLab\Requirements\Models
 */
abstract class Requirement implements \CatLab\Requirements\Interfaces\Requirement
{
    abstract function getTemplate() : string;

    /**
     * @param RequirementValidationException $exception
     * @return Message
     */
    public function getErrorMessage(RequirementValidationException $exception) : Message
    {
        $message = sprintf(
            $this->getTemplate(),
            $exception->getProperty()->getPropertyName()
        );

        return new Message(
            $message,
            $exception->getRequirement(),
            $exception->getProperty()->getPropertyName()
        );
    }
}