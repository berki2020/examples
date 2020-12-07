<?php

include $_SERVER['DOCUMENT_ROOT'] . '/oop/level4/task2/autoload.php';

use task2\Creator;

$items = [
    'Begemot',
    'Chicken',
    'Monkey',
    'Elephant',
    'Turkey',
    'Pen',
    'Tiger',
    'Pencil',
    'Table',
    'Mouse',
];

foreach ($items as $item) {
    Creator::create($item)->show();
    echo '<br>';
}
