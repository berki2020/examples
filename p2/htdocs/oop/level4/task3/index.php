<?php

namespace task3;

include $_SERVER['DOCUMENT_ROOT'] . '/oop/level4/task3/autoload.php';

use task3\Display;

$strings = [
    'string1',
    'string2',
    'string3',
    'string4',
    'string5',
    'string6',
    'string7',
];

$formater1 = new AnyFormatterClass();
$formater2 = new AnyRenderableClass();
$formater3 = 'string';

$display = new Display();

foreach ($strings as $string) {
    $display->show($formater1, $string);
    $display->show($formater2, $string);
    $display->show($formater3, $string);
    echo '<br>';
}
