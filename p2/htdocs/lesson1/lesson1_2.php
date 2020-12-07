<?php

$br = '<br>';
//Задание 4
$firstArray = [1, 2, 3];
echo $firstArray[1] . $br;

//Задание 5
$associativeArray = ['first' => 1, 'second' => 2, 'third' => 3];
echo $associativeArray['second'] . $br;

//Задание 6
$twoDimensionalArray = [
    [1, 2, 3,],
    [4, 5, 6,],
    [7, 8, 9,],
];
echo $twoDimensionalArray[0][1] + $twoDimensionalArray[2][2] + $twoDimensionalArray[2][0] . $br;

//Задание 7
$result1 = [
    'AUTHOR' => [
        ['fullName' => 'firstAuthor', 'email' => 'emailFirstAuthor'],
    ],
    'BOOK' => [
        ['title' => 'firstBook', 'email' => 'emailFirstAuthor'],
    ],
];

foreach ($result1 as $key => $elem) {
    $firstParam = ($key == 'AUTHOR') ? 'fullName' : 'title';
    $secondParam = 'email';
    echo $elem[0][$firstParam] . ' ' . $elem[0][$secondParam] . $br;
}
// echo $result1['AUTHOR'][0]['fullName'] . ' ' . $result1['AUTHOR'][0]['email'] . $br;
// echo $result1['BOOK'][0]['title'] . ' ' . $result1['BOOK'][0]['email'] . $br;

//Задание 8
$result2 = [
    'AUTHORS' => [
        ['fullName' => 'firstAuthor', 'email' => 'emailFirstAuthor'],
        ['fullName' => 'secondAuthor', 'email' => 'emailSecondAuthor'],
        ['fullName' => 'thirdAuthor', 'email' => 'emailThirdAuthor'],
    ],
    'BOOKS' => [
        ['title' => 'firstBook', 'email' => 'emailFirstAuthor'],
        ['title' => 'secondBook', 'email' => 'emailSecondAuthor'],
        ['title' => 'thirdBook', 'email' => 'emailThirdAuthor'],
    ],
];

foreach ($result2 as $key => $values) {
    $firstParam = ($key == 'AUTHORS') ? 'fullName' : 'title';
    $secondParam = 'email';

    foreach ($values as $value) {
        echo $value[$firstParam] . ' ' . $value[$secondParam] . $br;
    }
}

//Задание 9
$result3 = [
    'AUTHORS' => [
        'emailFirstAuthor' => ['fullName' => 'firstAuthor', 'birthday' => 1982,],
        'emailSecondAuthor' => ['fullName' => 'secondAuthor', 'birthday' => 1972],
        'emailThirdAuthor' => ['fullName' => 'thirdAuthor', 'birthday' => 1962],
    ],
    'BOOKS' => [
        ['title' => 'firstBook', 'email' => 'emailFirstAuthor'],
        ['title' => 'secondBook', 'email' => 'emailSecondAuthor'],
        ['title' => 'thirdBook', 'email' => 'emailThirdAuthor'],
    ],
];

$bothPart = $result3['AUTHORS'][$result3['BOOKS'][1]['email']];
echo $bothPart['fullName'] . ' ' .$bothPart['birthday'];