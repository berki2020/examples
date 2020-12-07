<?php

$br = '<br>';
$stringsArray = [
    'first string 123456789987654321',
    'second string 123456789987654321',
    'third string 123456789987654321',
    'fourth string 123456789987654321',
];

function subStringFunction($string, $length = 12)
{
    return strlen($string) > $length ? substr($string, 0, $length) . '...' : $string;
}

foreach ($stringsArray as $key => $string) {
    $stringsArray[$key] = subStringFunction($string);
}

foreach ($stringsArray as $string) {
    echo $string . $br;
}
