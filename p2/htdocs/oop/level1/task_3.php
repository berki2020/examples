<?php

namespace Factory;

class ToyFactory
{
    public function createToy($name)
    {
        return new Toy($name, rand(0, 100));
    }
}

class Toy
{
    public $name;
    public $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}

$quantityToys = rand(5, 20);
$namesOfToys = ['кошка', 'собака', 'слон', 'бегемот', 'жираф'];
$factory = new ToyFactory();
$sum = 0;

for ($i = 0; $i < $quantityToys; $i++) {
    $name = $namesOfToys[array_rand($namesOfToys, 1)];
    $toy = $factory->createToy($name);
    $sum += $toy->price;
    echo $toy->name . ' - ' . $toy->price . '<br>';
}

echo 'Итого - ' . $sum;
