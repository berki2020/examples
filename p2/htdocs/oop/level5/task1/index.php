<?php

namespace task1;

include $_SERVER['DOCUMENT_ROOT'] . '/oop/level5/task1/autoload.php';
include $_SERVER['DOCUMENT_ROOT'] . '/oop/level5/task1/src/Division.php';

use task1\Calculator;

$callbacks = [
    function($a, $b) {
        return $a + $b;
    },
    'task1\division',
    [CallbackClass::class, 'myMultiplicationStaticCallbackMethod'],
    [new CallbackClass(), 'mySubtractionCallbackMethod'],
];

$pairs = [[1, 2], [3, 4], [5, 6], [7, 8],];

foreach ($pairs as $pair) {
    foreach ($callbacks as $callback) {
        echo Calculator::calculate($pair[0], $pair[1], $callback) . '<br>';
    }
}
