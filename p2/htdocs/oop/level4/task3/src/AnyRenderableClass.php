<?php

namespace task3;

use task3\Renderable;

class AnyRenderableClass implements Renderable
{
    public function render($string)
    {
        echo 'Renderable! ' . $string . PHP_EOL;
    }
}

