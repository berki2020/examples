<?php

namespace Farm2;

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

class HoofAnimal extends Animal
{
}

class Bird extends Animal
{
    public function walk()
    {
        $this->tryToFly();
    }

    public function tryToFly()
    {
        echo "Вжих-Вжих-топ-топ" . PHP_EOL;
    }
}

class Cow extends HoofAnimal
{
    public function say()
    {
        echo 'му-му' . PHP_EOL;
    }
}

class Pig extends HoofAnimal
{
    public function say()
    {
        echo 'хрю-хрю' . PHP_EOL;
    }
}

class Horse extends HoofAnimal
{
    public function say()
    {
        echo 'иго-го' . PHP_EOL;
    }
}

class Chicken extends Bird
{
    public function say()
    {
        echo 'ко-ко' . PHP_EOL;
    }
}

class Goose extends Bird
{
    public function say()
    {
        echo 'ха-ха' . PHP_EOL;
    }
}

class Turkey extends Bird
{
    public function say()
    {
        echo 'ур-ур' . PHP_EOL;
    }
}

class Farm
{
    protected $animals = [];

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

class BirdFarm extends Farm
{
    public function addAnimal(Animal $animal)
    {
        parent::addAnimal($animal);
        $this->showAnimalsCount();
    }

    public function showAnimalsCount()
    {
        echo  "Птиц на ферме: " . count($this->animals) . PHP_EOL;
    }
}

class Farmer
{
    public function addAnimal(Farm $farm, Animal $animal)
    {
        $farm->addAnimal($animal);
    }

    public function rollCall(Farm $farm)
    {
        $farm->rollCall();
    }
}

$farmer = new Farmer();
$farm = new Farm();
$birdFarm = new BirdFarm();
$farmer->addAnimal($farm, new Cow());
$farmer->addAnimal($farm, new Pig());
$farmer->addAnimal($farm, new Pig());
$farmer->addAnimal($birdFarm, new Chicken());
$farmer->addAnimal($birdFarm, new Turkey());
$farmer->addAnimal($birdFarm, new Turkey());
$farmer->addAnimal($birdFarm, new Turkey());
$farmer->addAnimal($farm, new Horse());
$farmer->addAnimal($farm, new Horse());
$farmer->addAnimal($birdFarm, new Goose());
$farmer->rollCall($farm);
$farmer->rollCall($birdFarm);
