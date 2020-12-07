<?php

namespace AnimalWorld;

abstract class Animal
{
    abstract public function move();
}

abstract class WaterAnimal extends Animal
{
    public function move()
    {
        echo 'плыву' . PHP_EOL;
    }
}

abstract class LandAnimal extends Animal
{
    public function move()
    {
        echo 'топ-топ' . PHP_EOL;
    }
}

class Fish extends WaterAnimal
{
}

class Tiger extends LandAnimal
{
}

class Bear extends LandAnimal
{
}

class Elk extends LandAnimal
{
}

class Snake extends LandAnimal
{
    public function move()
    {
        echo 'ползу' . PHP_EOL;
    }
}

class Camel extends LandAnimal
{
}

class Elephant extends LandAnimal
{
}

class Dolphin extends WaterAnimal
{
}
