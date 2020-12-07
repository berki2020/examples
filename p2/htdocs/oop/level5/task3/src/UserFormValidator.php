<?php

namespace task3;

class UserFormValidator
{
    public function validate($user)
    {
        if (empty($user['name'])) {
            throw new \Exception('не заполнено поле имя', 10);
        }

        if ($user['age'] < 18) {
            throw new \Exception('возраст меньше 18', 20);
        }
        
        if (!preg_match("/[a-zA-Z0-9-]*@[a-zA-Z0-9]*\.[a-zA-Z-]+/", $user['email'])) {
            throw new \Exception('не верный формат email', 30);
        }

        return true;
    }
}
