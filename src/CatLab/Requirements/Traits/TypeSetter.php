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
        $arguments = func_get_args();
        array_unshift($arguments, PropertyType::INTEGER);
        call_user_func_array([ $this, 'setType' ], $arguments);

        return $this;
    }

    /**
     * @return $this
     */
    public function string()
    {
        $arguments = func_get_args();
        array_unshift($arguments, PropertyType::STRING);
        call_user_func_array([ $this, 'setType' ], $arguments);
        return $this;
    }

    /**
     * @return $this
     */
    public function bool()
    {
        $arguments = func_get_args();
        array_unshift($arguments, PropertyType::BOOL);
        call_user_func_array([ $this, 'setType' ], $arguments);
        return $this;
    }

    /**
     * @return $this
     */
    public function datetime()
    {
        $arguments = func_get_args();
        array_unshift($arguments, PropertyType::DATETIME);
        call_user_func_array([ $this, 'setType' ], $arguments);
        return $this;
    }

    /**
     * @return $this
     */
    public function number()
    {
        $arguments = func_get_args();
        array_unshift($arguments, PropertyType::NUMBER);
        call_user_func_array([ $this, 'setType' ], $arguments);
        return $this;
    }

    /**
     * @return $this
     */
    public function object()
    {
        $arguments = func_get_args();
        array_unshift($arguments, PropertyType::OBJECT);
        call_user_func_array([ $this, 'setType' ], $arguments);
        return $this;
    }
}