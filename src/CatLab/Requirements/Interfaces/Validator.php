<?php

namespace CatLab\Requirements\Interfaces;
use CatLab\Requirements\Exceptions\RequirementValidationException;
use CatLab\Requirements\Models\Message;

/**
 * Interface Validator
 * @package CatLab\Requirements\Interfaces
 */
interface Validator
{
    /**
     * @param $value
     * @return mixed
     * @throws RequirementValidationException
     */
    public function validate($value);

    /**
     * @param RequirementValidationException $exception
     * @return Message
     */
    public function getErrorMessage(RequirementValidationException $exception) : Message;
}