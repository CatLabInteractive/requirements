<?php

/**
 * Class MockProperty
 */
class MockProperty implements \CatLab\Requirements\Interfaces\Property
{
    use \CatLab\Requirements\Traits\RequirementSetter;

    /**
     * Return the human readable path of the property.
     * @return string
     */
    public function getPropertyName() : string
    {
        return 'MockProperty';
    }
}