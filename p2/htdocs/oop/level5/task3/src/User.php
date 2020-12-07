<?php

namespace task3;

class User
{
    public function load($id)
    {
        if ($id % 2 == 0) {
            throw new \Exception('ошибка авторизации, id не найден в базе');
        }
        
        return true;
    }

    public function save($data)
    {
        return (bool) rand(0, 1);
    }
}
