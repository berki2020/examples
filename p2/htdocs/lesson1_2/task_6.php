<?php

$studentsCount = rand(1, 1000);

$lastTwoDigits = $studentsCount % 100;
if ($lastTwoDigits < 11 || $lastTwoDigits > 14) {
    $lastDigit = $studentsCount % 10;

    switch ($lastDigit) {
        case 1:
            echo $studentsCount . ' студент';
            break;
        case 2:
            echo $studentsCount . ' студента';
            break;
        case 3:
            echo $studentsCount . ' студента';
            break;
        case 4:
            echo $studentsCount . ' студента';
            break;
        default:
            echo $studentsCount . ' студентов';
            break;
    }
} else {
    echo $studentsCount . ' студентов';
}