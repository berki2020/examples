<?php

namespace Zoo;

class Cat
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

class Dog
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

class Fish
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

$cat1 = new Cat('Бегемот');
$cat2 = new Cat('Пушок');
$cat3 = new Cat('Пушка');

$dog1 = new Dog('Палкан');
$dog2 = new Dog('Бобик');
$dog3 = new Dog('Рекс');
$dog4 = new Dog('Рей');
$dog5 = new Dog('Варвик');

$fish = new Fish('Немо');
