<?php

namespace Market;

include $_SERVER['DOCUMENT_ROOT'] . '/oop/level1/task_4.php';
use \Notifications\User;

class Order
{
    private $basket;

    public function __construct(Basket $basket)
    {
        $this->basket = $basket;
    }

    public function getBasket()
    {
        return $this->basket;
    }

    public function getPrice()
    {
        return $this->getBasket()->getPrice();
    }
}

class Basket
{
    private $products = [];

    public function addProduct(Product $product, $quantity)
    {
        $this->products[] = ['product' => $product, 'quantity' => $quantity];
    }

    public function getPrice()
    {
        $price = 0;
        foreach ($this->products as $product) {
            $price += $product['product']->getPrice();
        }

        return $price;
    }

    public function describe()
    {
        $basketInfo = '';
        foreach ($this->products as $product) {
            $basketInfo .= $product['product']->getName() . ' - ' . $product['product']->getPrice() . ' - ' . $product['quantity'] . '<br>';
        }

        return $basketInfo;
    }
}

class Product
{
    private $name;
    private $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }
}

$basket = new Basket();
$products = ['чай', 'шоколад', 'молоко', 'курица', 'картофель', 'яблоко'];

for ($i = 0; $i < 10; $i ++) {
    $productName = $products[array_rand($products, 1)];
    $basket->addProduct(new Product($productName, rand(10, 100)), rand(1, 5));
}

$order = new Order($basket);

$describeOrder = $order->getBasket()->describe();
$priceOrder = $order->getPrice();
echo $describeOrder;
echo $priceOrder . '<br>';

$message = "для вас создан заказ, на сумму: $priceOrder Состав:<br> $describeOrder";

(new User('Николай Николаич', 'nikolay@mail.ru', 'мужчина', 50, '8(999)-123-45-67'))->notify($message);
