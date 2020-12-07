<?php

namespace Balls;

class Box
{
    public function putBall(Ball $ball)
    {
        echo 'В корзину добавлен мяч' . PHP_EOL;
    }
}

class Ball
{
    static $count;

    public function __construct()
    {
        self::$count++;
    }
}

$box = new Box();
$rand = rand(1, 20);

for ($i = 0; $i < $rand; $i++) {
    $ball = new Ball();
    $box->putBall($ball);
}

echo $ball::$count . PHP_EOL;
