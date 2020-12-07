<?php

namespace task2;

use task2\EmptyItem;

class Creator
{
    public static function create($name)
    {
        $className = __NAMESPACE__ . '\\' . $name;
        if (class_exists($className)) {
            return new $className($name);
        } else {
            return new EmptyItem($name);
        }
    }
}
