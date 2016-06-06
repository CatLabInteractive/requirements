<?php

namespace CatLab\Requirements\Collections;

use CatLab\Base\Collections\Collection;
use CatLab\Requirements\Exceptions\PropertyValidationException;
use CatLab\Requirements\Exceptions\RequirementValidationException;
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
     * @throws PropertyValidationException
     */
    public function validate($value)
    {
        $messages = new MessageCollection();
        foreach ($this as $validator) {
            /** @var Validator $validator */
            try {
                $validator->validate($value);
            } catch (RequirementValidationException $e) {
                $messages->add($e->getRequirement()->getErrorMessage($e));
            }
        }

        if (count($messages) > 0) {
            throw PropertyValidationException::make($messages);
        }
    }
}