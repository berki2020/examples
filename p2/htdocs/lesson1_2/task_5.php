<?php

$br = '<br>';
$city1 = 100;
$city1Radius = 100;
$city2 = 300;
$city2Radius = 50;

for ($i = 1; $i < 11; $i++) {
    $car = rand(0, 1000);

    if (abs($car - $city1) <= $city1Radius || abs($car - $city2) <= $city2Radius) {
        echo 'Машина ' . $i . ' едет по городу на ' . $car . ' км со скоростью не более 70' . $br;
    } else {
        echo 'Машина ' . $i . ' едет вне города на ' . $car . ' км со скоростью не более 90' . $br;
    }
}
