<?php

namespace task2;

use task2\Item;

class EmptyItem extends Item
{
    public function show()
    {
        echo 'Класс ' . $this->name . ' не найден';
    }
}
