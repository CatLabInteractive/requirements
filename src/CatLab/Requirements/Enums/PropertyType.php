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
    const DATETIME = 'dateTime';
    const NUMBER = 'number';
    const BOOL = 'boolean';
    const OBJECT = 'object';

    const HTML = 'html';

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
            self::BOOL,
            self::HTML
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
