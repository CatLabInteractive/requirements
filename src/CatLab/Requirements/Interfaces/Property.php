<?php

namespace CatLab\Requirements\Interfaces;

/**
 * Interface Property
 * @package CatLab\Requirements\Interfaces
 */
interface Property
{
    /**
     * Return the human readable path of the property.
     * @return string
     */
    public function getPropertyName() : string;

    /**
     * @return string
     */
    public function getType() : string;
}