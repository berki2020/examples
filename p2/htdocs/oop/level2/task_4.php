<?php

namespace Forge;

class Forge
{
    public function burn($object)
    {
        $flame = $object->burn();
        echo $flame->render((string)$object) . PHP_EOL;
    }
}

class BlueFlame
{
    public function render($name)
    {
        return $name . " голубое пламя";
    }
}

class RedFlame
{
    public function render($name)
    {
        return $name . " красное пламя";
    }
}

class Smoke
{
    public function render($name)
    {
        return $name . " лишь задымился";
    }
}

class Sky
{
    public function burn()
    {
        return new RedFlame();
    }

    public function __toString()
    {
        return 'небо';
    }
}

class Car
{

    public function burn()
    {
        return new BlueFlame();
    }

    public function __toString()
    {
        return 'машина';
    }
}

class Tree
{
    public function burn()
    {
        return new RedFlame();
    }

    public function __toString()
    {
        return 'дерево';
    }
}

class Water
{
    public function burn()
    {
        return new Smoke();
    }

    public function __toString()
    {
        return 'вода';
    }
}

class Phone
{
    public function burn()
    {
        return new BlueFlame();
    }

    public function __toString()
    {
        return 'телефон';
    }
}

$forge = new Forge();
$forge->burn(new Tree());
$forge->burn(new Sky());
$forge->burn(new Car());
$forge->burn(new Water());
$forge->burn(new Phone());

class Plate
{
    public function burn()
    {
        return new BlueFlame();
    }

    public function __toString()
    {
        return 'тарелка';
    }
}

$forge->burn(new Plate());
