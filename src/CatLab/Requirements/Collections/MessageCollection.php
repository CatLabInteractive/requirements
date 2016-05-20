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