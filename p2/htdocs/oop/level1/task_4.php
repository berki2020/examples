<?php

namespace Notifications;

class User
{
    private $fullname;
    private $email;
    private $sex;
    private $age;
    private $phone;

    public function __construct($fullname, $email, $sex = '', $age = '', $phone = '')
    {
        $this->fullname = $fullname;
        $this->email = $email;
        $this->sex = $sex;
        $this->age = $age;
        $this->phone = $phone;
    }

    public function notifyOnEmail($message)
    {
        (new Notification($this->fullname, 'email', $this->email))->send($message);
    }

    public function  notifyOnPhone($message)
    {
        if ($this->phone != '') {
            (new Notification($this->fullname, 'телефон', $this->phone))->send($message);
        } else {
            echo "У клиента $this->fullname не указан номер телефона";
        }
    }

    public function  notify($message)
    {
        if ($this->age < 18 || $this->age == '') {
            $message = $this->censor($message);
        }

        if ($this->phone != '') {
            $this->notifyOnPhone($message);
        }

        $this->notifyOnEmail($message);
    }

    private function  censor($message)
    {
        return str_replace('badWord', 'goodWord', $message);
    }
}

class Notification
{
    private $receiver;
    private $via;
    private $to;

    public function __construct($receiver, $via, $to)
    {
        $this->receiver = $receiver;
        $this->via = $via;
        $this->to = $to;
    }

    public function send($message)
    {
        echo "Уведомление клиенту: $this->receiver на $this->via($this->to): $message<br>";
    }
}


(new User('Иванов Иван Иванович', 'ivanov@mail.ru', 'мужчина', 50, '8(999)-123-45-67'))->notify('необходимо погасить задолженность за услуги');
(new User('Иванова Ирина Ивановна', 'ivanova@mail.ru', 'женщина', 17, '8(999)-231-45-67'))->notify('необходимо погасить задолженность за услуги badWord');
(new User('Васиилй Андреевич Андреев', 'andreev@mail.ru', 'мужчина', 24))->notify('необходимо погасить задолженность за услуги badWord');
(new User('Генадий Андреевич Андреев', 'andreevG@mail.ru', 'мужчина'))->notify('необходимо погасить задолженность за услуги badWord');
(new User('Наталья Ивановна Андреева', 'andreevna@mail.ru', 'женщина', 27))->notify('необходимо погасить задолженность за услуги badWord');
