<?php

include $_SERVER['DOCUMENT_ROOT'] . '/include/main_menu.php';

function arraySort($array, $key = 'sort', $sort = SORT_ASC)
{
    usort($array, function ($a, $b) use ($key, $sort) {
        return $sort == SORT_DESC ? $a[$key] <=> $b[$key] : $b[$key] <=> $a[$key];
    });
    return $array;
}

function subStringFunction($string, $length = 24)
{
    return strlen($string) > $length ? substr($string, 0, $length) : $string;
}

function printMenu($array, $class = '', $sort = SORT_ASC)
{
    $array = arraySort($array, 'sort', $sort);

    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    include $_SERVER['DOCUMENT_ROOT'] . '/include/menu_template.php';
}
