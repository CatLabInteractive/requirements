<?php

namespace CatLab\Requirements\Collections;

use CatLab\Base\Collections\Collection;
use CatLab\Requirements\Models\Message;

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

    public function toMap()
    {
        $out = [];
        foreach ($this as $v) {
            /** @var Message $v */
            if (!isset($out[$v->getPropertyName()])) {
                $out[$v->getPropertyName()] = [];
            }
            $out[$v->getPropertyName()][] = $v->getMessage();
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