<?php

namespace CatLab\Requirements\Exceptions;
use CatLab\Requirements\Collections\MessageCollection;
use CatLab\Requirements\Exists;
use CatLab\Requirements\Interfaces\Property;

/**
 * Class PropertyValidationException
 * @package CatLab\Requirements\Exceptions
 */
class PropertyValidationException extends ValidationException
{
    /**
     * @var Property
     */
    private $property;

    /**
     * @var MessageCollection
     */
    private $messages;

    /**
     * @param Property $property
     * @param MessageCollection $collection
     * @return PropertyValidationException
     */
    public static function make(Property $property, MessageCollection $collection)
    {
        $e = new self();
        $e->property = $property;
        $e->messages = $collection;

        return $e;
    }

    /**
     * @return MessageCollection
     */
    public function getMessages()
    {
        return $this->messages;
    }
}