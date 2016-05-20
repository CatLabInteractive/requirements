<?php

namespace CatLab\Requirements\Collections;

use CatLab\Base\Collections\Collection;
use CatLab\Requirements\Exceptions\PropertyValidationException;
use CatLab\Requirements\Exceptions\RequirementValidationException;
use CatLab\Requirements\Interfaces\Property;
use CatLab\Requirements\Interfaces\Requirement;

/**
 * Class Requirements
 * @package CatLab\Requirements\Collections
 */
class RequirementCollection extends Collection
{
    /**
     * @param $value
     * @param Property $property
     * @throws PropertyValidationException
     */
    public function validate(Property $property, $value)
    {
        $messages = new MessageCollection();
        foreach ($this as $requirement) {
            /** @var Requirement $requirement */
            try {
                $requirement->validate($property, $value);
            } catch (RequirementValidationException $e) {
                $messages->add($e->getRequirement()->getErrorMessage($e));
            }
        }

        if (count($messages) > 0) {
            throw PropertyValidationException::make($property, $messages);
        }
    }
}