<?php

namespace CatLab\Requirements\Traits;

use CatLab\Requirements\Enums\PropertyType;

/**
 * Class TypeSetter
 * @package CatLab\Requirements\Enums\PropertyType
 */
trait TypeSetter
{
    /**
     * @param $type
     * @return $this
     */
    public abstract function setType($type);

    /**
     * @return $this
     */
    public function int()
    {
        $this->setType(PropertyType::INTEGER);
        return $this;
    }

    /**
     * @return $this
     */
    public function string()
    {
        $this->setType(PropertyType::STRING);
        return $this;
    }

    /**
     * @return $this
     */
    public function bool()
    {
        $this->setType(PropertyType::BOOL);
        return $this;
    }

    /**
     * @return $this
     */
    public function datetime()
    {
        $this->setType(PropertyType::DATETIME);
        return $this;
    }

    /**
     * @return $this
     */
    public function number()
    {
        $this->setType(PropertyType::NUMBER);
        return $this;
    }
    
    public function object()
    {
        $this->setType(PropertyType::OBJECT);
        return $this;
    }
}