<?php

namespace CatLab\Requirements\Interfaces;
use CatLab\Requirements\Exceptions\RequirementValidationException;
use CatLab\Requirements\Exceptions\ValidationException;
use CatLab\Requirements\Models\Message;

/**
 * Interface Requirement
 * @package CatLab\Requirements\Interfaces
 */
interface Requirement
{
    /**
     * @param Property $property
     * @param $value
     * @return mixed
     * @throws RequirementValidationException
     */
    public function validate(Property $property, $value);

    /**
     * @param RequirementValidationException $exception
     * @return Message
     */
    public function getErrorMessage(RequirementValidationException $exception) : Message;
    
}