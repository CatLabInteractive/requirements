<?php

namespace CatLab\Requirements\Exceptions;

use CatLab\Requirements\Collections\MessageCollection;
use CatLab\Requirements\Exists;
use CatLab\Requirements\Interfaces\Property;

/**
 * Class ResourceValidationException
 * @package CatLab\Requirements\Exceptions
 */
class ResourceValidationException extends ValidationException
{
    /**
     * @var MessageCollection
     */
    private $messages;

    /**
     * @param MessageCollection $collection
     * @return ResourceValidationException
     */
    public static function make(MessageCollection $collection)
    {
        $e = new self();
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