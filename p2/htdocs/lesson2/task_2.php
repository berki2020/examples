<?php

$br = '<br>';
$menuArray = [
    ['title' => 'firstElem', 'sort' => 1, 'path' => 'urlOfFirstElem'],
    ['title' => 'secondElem', 'sort' => 2, 'path' => 'aaurlOfSecondElem'],
    ['title' => 'thirdElem', 'sort' => 3, 'path' => 'urlOfThirdElem'],
    ['title' => 'fourthElem', 'sort' => 4, 'path' => 'zzzzurlOfFourthElem'],
];

function arraySort($array, $key = 'sort', $sort = SORT_ASC)
{
   usort($array, function ($a, $b) use ($key, $sort) {
       return $sort == SORT_DESC ? $a[$key] <=> $b[$key] : $b[$key] <=> $a[$key];
   });
   return $array;
}


$menuArray = arraySort($menuArray, 'sort', SORT_ASC);
foreach ($menuArray as $elem) {
    echo $elem['title'] . ' ' . $elem['sort'] . ' ' . $elem['path'] . $br;
}

$menuArray = arraySort($menuArray, 'sort', SORT_DESC);
foreach ($menuArray as $elem) {
    echo $elem['title'] . ' ' . $elem['sort'] . ' ' . $elem['path'] . $br;
}
