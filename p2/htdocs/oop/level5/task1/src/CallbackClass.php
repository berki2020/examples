<?php

namespace task1;

class CallbackClass
{
    static function myMultiplicationStaticCallbackMethod($a, $b)
    {
        return $a * $b;
    }

    static function mySubtractionCallbackMethod($a, $b)
    {
        return $a - $b;
    }
}
