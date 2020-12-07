<?php

namespace Animals;

class HungryCat
{
    public $name;
    public $color;
    public $favoriteFood;

    public function __construct($name, $color, $favoriteFood)
    {
        $this->name = $name;
        $this->color = $color;
        $this->favoriteFood = $favoriteFood;
    }

    public function eat($food)
    {
        $mur = '';
        if ($food == $this->favoriteFood) {
            $mur = " и замурчал 'мррррр' от своей любимой еды";
        }

        echo "Голодный кот $this->name, особые приметы: цвет - $this->color, съел $food" . $mur . '<br>';
    }
}

$cat1 = new HungryCat('Бегемот', 'черный', 'сметана');
$cat2 = new HungryCat('Василий', 'рыжий', 'колбаса');

$cat1->eat('вискас');
$cat1->eat('молоко');
$cat1->eat('сметана');
$cat1->eat('курица');
$cat1->eat('рыба');

$cat2->eat('вискас');
$cat2->eat('молоко');
$cat2->eat('сметана');
$cat2->eat('курица');
$cat2->eat('колбаса');
