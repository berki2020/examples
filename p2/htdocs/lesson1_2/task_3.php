<?php

$firstCoordinate = [0, 0];
$secondCoordinate = [5, 4];
$pointCoordinate = [0, 1];

$firstCondition = ($pointCoordinate[0] >= $firstCoordinate[0]) && ($pointCoordinate[0] <= $secondCoordinate[0]);
$secondCondition = ($pointCoordinate[1] >= $firstCoordinate[1]) && ($pointCoordinate[1] <= $secondCoordinate[1]);

if ($firstCondition && $secondCondition) {
    echo 'point in rectangle';
} else {
    echo 'point not in rectangle';
}
