<?php

namespace CatLab\Requirements\Collections;

use CatLab\Base\Collections\Collection;

/**
 * Class Messages
 * @package CatLab\Requirements\Collections
 */
class MessageCollection extends Collection
{
    /**
     * @param $messages
     */
    public function merge(MessageCollection $messages)
    {
        foreach ($messages as $message) {
            $this->add($message);
        }
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $out = [];
        foreach ($this as $v) {
            $out[] = $v->toArray();
        }
        return $out;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $out = "";
        foreach ($this as $message) {
            $out .= $message->__toString() . PHP_EOL;
        }
        return $out;
    }
}