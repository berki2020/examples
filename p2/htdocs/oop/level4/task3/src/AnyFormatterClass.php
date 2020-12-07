<?php

namespace task3;

use task3\Formatter;

class AnyFormatterClass implements Formatter
{
    public function format($string): string
    {
        return $string . ' Formatter!';
    }
}

