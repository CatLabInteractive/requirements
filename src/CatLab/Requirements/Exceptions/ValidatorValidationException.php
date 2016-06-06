<?php

namespace CatLab\Requirements\Exceptions;

use CatLab\Requirements\Collections\MessageCollection;
use CatLab\Requirements\Interfaces\Validator;

/**
 * Class ValidatorException
 * @package CatLab\Requirements\Exceptions
 */
class ValidatorValidationException extends ValidationException
{
    /**
     * @var Validator
     */
    private $validator;

    /**
     * @var mixed
     */
    private $value;

    /**
     * @param Validator $requirement
     * @param $value
     * @return RequirementValidationException
     */
    public static function make(
        Validator $requirement,
        $value
    ) {
        $e = new self(
            'Validation exception'
        );

        $e->validator = $requirement;
        $e->value = $value;

        return $e;
    }

    /**
     * @return Validator
     */
    public function getValidator()
    {
        return $this->validator;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}