<?php

namespace CatLab\Requirements\Enums;

/**
 * Interface PropertyType
 * @package CatLab\RESTResource\Contracts
 */
class PropertyType
{
    const INTEGER = 'integer';
    const STRING = 'string';
    const DATETIME = 'datetime';
    const NUMBER = 'number';
    const BOOL = 'bool';

    /**
     * @param $type
     * @return bool
     */
    public static function isNative($type)
    {
        return in_array($type, [
            self::INTEGER,
            self::STRING,
            self::DATETIME,
            self::NUMBER,
            self::BOOL
        ]);
    }

    /**
     * @param $type
     * @return bool
     */
    public static function isNumeric($type)
    {
        return in_array($type, [
            self::INTEGER,
            self::NUMBER
        ]);
    }
}