<?php

namespace CatLab\Requirements;

use CatLab\Requirements\Exceptions\RequirementValidationException;
use CatLab\Requirements\Models\Message;
use CatLab\Requirements\Models\TranslatableMessage;

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
        return new TranslatableMessage(
            $this->getTemplate(),
            [
                $exception->getProperty()->getPropertyName()
            ],
            $exception->getRequirement(),
            $exception->getProperty()->getPropertyName()
        );
    }
}
