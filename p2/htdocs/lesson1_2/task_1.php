<?php

$br = '<br>';
$result = [
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

foreach ($result['BOOKS'] as $book) {
    echo 'Книга ' . $book['title'] . ' ее написал ' . $result['AUTHORS'][$book['email']]['fullName'] .
         ' ' . $result['AUTHORS'][$book['email']]['birthday'] . ' ' . $book['email'] . $br;
}

shuffle($result['BOOKS']);

foreach ($result['BOOKS'] as $book) {
    echo 'Книга ' . $book['title'] . ' ее написал ' . $result['AUTHORS'][$book['email']]['fullName'] .
         ' ' . $result['AUTHORS'][$book['email']]['birthday'] . ' ' . $book['email'] . $br;
}
