<?php

namespace task1;

class Manager
{
    public function place($item)
    {
        if ($item instanceof Papers) {
            echo 'Положил ' . str_replace(__NAMESPACE__ . '\\', '', get_class($item)) . ' на стол' . PHP_EOL;
            return;
        } elseif ($item instanceof Instrument) {
            echo 'Убрал ' . str_replace(__NAMESPACE__ . '\\', '', get_class($item)) . ' внутрь стола' . PHP_EOL;
            return;
        } else {
            echo 'Выкинул ' . (is_object($item) ? get_class($item):$item) . ' в корзину' . PHP_EOL;
            return;
        }
    }
}
