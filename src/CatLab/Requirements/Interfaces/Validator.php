<?php

namespace CatLab\Requirements\Interfaces;
use CatLab\Requirements\Exceptions\RequirementValidationException;
use CatLab\Requirements\Exceptions\ValidatorValidationException;
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
     * @param ValidatorValidationException $exception
     * @return Message
     */
    public function getErrorMessage(ValidatorValidationException $exception) : Message;
}