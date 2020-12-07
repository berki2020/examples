<?php

namespace CatFactory;

class Cat
{
    public $name;
    public $color;
    public $age;

    public function __construct($name, $color, $age)
    {
        $this->name = $name;
        $this->color = $color;
        $this->age = $age;
    }
}

class CatFactory
{
    public static function createBlack8YearsOldCat($name)
    {
        return new Cat($name, 'black', 8);
    }

    public static function createBlackCat($name, $age)
    {
        return new Cat($name, 'black', $age);
    }

    public static function create10YearsOldCat($name, $color)
    {
        return new Cat($name, $color, 10);
    }

    public static function createPushokNameCat($color, $age)
    {
        return new Cat('Pushok', $color, $age);
    }

    public static function createWhiteCat($name, $age)
    {
        return new Cat($name, 'white', $age);
    }

    public static function createBegemotNameCat($color, $age)
    {
        return new Cat('Begemot', $color, $age);
    }

    public static function create5YearsOldCat($name, $color)
    {
        return new Cat($name, $color, 5);
    }
}

$catArray[] = CatFactory::create5YearsOldCat('Viktor', 'black');
$catArray[] = CatFactory::createBlackCat('Kotyara', 5);
$catArray[] = CatFactory::create10YearsOldCat('Natasha', 'orange');
$catArray[] = CatFactory::createPushokNameCat('white', 3);
$catArray[] = CatFactory::createWhiteCat('Mashka', 7);
$catArray[] = CatFactory::createBegemotNameCat('black', 5);
$catArray[] = CatFactory::create5YearsOldCat('Petr', 'gray');

echo '<pre>';
print_r($catArray);
