<?php

namespace CatLab\Requirements\Exceptions;

use CatLab\Requirements\Collections\MessageCollection;

/**
 * Class ValidatorException
 * @package CatLab\Requirements\Exceptions
 */
class ValidatorException extends ValidationException
{
    /**
     * @var MessageCollection
     */
    private $messages;

    /**
     * @param MessageCollection $collection
     * @return PropertyValidationException
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