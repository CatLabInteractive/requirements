<?php

namespace CatLab\Requirements\Collections;

use CatLab\Base\Collections\Collection;
use CatLab\Requirements\Exceptions\PropertyValidationException;
use CatLab\Requirements\Exceptions\RequirementException;
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
     * @param $serializedCollection
     * @return RequirementCollection
     * @throws RequirementException
     */
    public static function make($serializedCollection)
    {
        if ($serializedCollection instanceof RequirementCollection) {
            return $serializedCollection;
        }

        try {
            $collection = unserialize($serializedCollection);
            if (!$collection instanceof RequirementCollection) {
                throw new RequirementException("Could not unserialize serialized RequirementCollection.");
            }
        } catch (\Exception $e) {
            throw new RequirementException(
                "Could not unserialize serialized RequirementCollection: " . $e->getMessage(),
                500,
                $e
            );
        }

        return $collection;
    }

    /**
     * @return string
     */
    public function serialize()
    {
        return serialize($this);
    }

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