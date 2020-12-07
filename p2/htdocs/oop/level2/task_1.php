<?php

namespace Farm;

class Animal
{
    public function walk()
    {
        echo 'топ-топ' . PHP_EOL;
    }

    public function say()
    {
        echo 'что-то говорит' . PHP_EOL;
    }
}

class Cow extends Animal
{
    public function say()
    {
        echo 'му-му' . PHP_EOL;
    }
}

class Pig extends Animal
{
    public function say()
    {
        echo 'хрю-хрю' . PHP_EOL;
    }
}

class Chicken extends Animal
{
    public function say()
    {
        echo 'ко-ко' . PHP_EOL;
    }
}

class Farm
{
    private $animals = [];

    public function addAnimal(Animal $animal)
    {
        $this->animals[] = $animal;
        $animal->walk();
    }

    public function rollCall()
    {
        $shuffleAnimals = $this->animals;
        shuffle($shuffleAnimals);

        foreach ($shuffleAnimals as $animal) {
            $animal->say();
        }
    }
}

$farm = new Farm();
$farm->addAnimal(new Cow());
$farm->addAnimal(new Pig());
$farm->addAnimal(new Pig());
$farm->addAnimal(new Chicken());
$farm->rollCall();
