<?php

namespace task3;

use task3\AnyFormatterClass;
use task3\AnyRenderableClass;

class Display
{
    public static function show($formatter, $string)
    {
        if ($formatter instanceof Renderable) {
            $formatter->render($string);
            return;
        } 

        if ($formatter instanceof Formatter || method_exists($formatter, 'format')) {
            echo $formatter->format($string) . PHP_EOL;
            return;
        }

        echo $string . PHP_EOL;
    }
}
