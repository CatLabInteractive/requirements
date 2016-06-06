<?php

namespace CatLab\Requirements\Collections;

use CatLab\Base\Collections\Collection;
use CatLab\Requirements\Exceptions\PropertyValidationException;
use CatLab\Requirements\Exceptions\RequirementValidationException;
use CatLab\Requirements\Exceptions\ResourceValidationException;
use CatLab\Requirements\Exceptions\ValidatorValidationException;
use CatLab\Requirements\Interfaces\Property;
use CatLab\Requirements\Interfaces\Requirement;
use CatLab\Requirements\Interfaces\Validator;

/**
 * Class ValidatorCollection
 * @package CatLab\Requirements\Collections
 */
class ValidatorCollection extends Collection
{
    /**
     * @param $value
     * @throws ResourceValidationException
     */
    public function validate($value)
    {
        $messages = new MessageCollection();
        foreach ($this as $validator) {
            /** @var Validator $validator */
            try {
                $validator->validate($value);
            } catch (ValidatorValidationException $e) {
                $messages->add($e->getValidator()->getErrorMessage($e));
            }
        }

        if (count($messages) > 0) {
            throw ResourceValidationException::make($messages);
        }
    }
}