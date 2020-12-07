<?php

namespace BlackBox;

class BlackBox
{
    private $data = [];

    public function addLog($message)
    {
        $this->data[] = $message;
    }

    public function getDataForEngineer(Engineer $engineer)
    {
        return $this->data;
    }
}

class Plane
{
    protected $blackBox;

    public function __construct()
    {
        $this->blackBox = new BlackBox();
    }

    public function flyAndCrush()
    {
        $this->flyProcess();
        $this->crushProcess();
    }

    public function flyProcess()
    {
        $this->addLog('Полет нормальный');
    }

    final public function crushProcess()
    {
        $this->addLog('Самолет падает');
    }

    protected function addLog($message)
    {
        $this->blackBox->addLog($message . PHP_EOL);
    }

    public function getBoxForEngineer(Engineer $engineer)
    {
        $engineer->setBox($this->blackBox);
    }
}

class Engineer
{
    protected $blackBox;

    public function setBox(BlackBox $blackBox)
    {
        $this->blackBox = $blackBox;
    }

    public function takeBox(Plane $plane)
    {
        $plane->getBoxForEngineer($this);
    }

    public function decodeBox()
    {
        $data = $this->blackBox->getDataForEngineer($this);

        foreach ($data as $row) {
            echo $row;
        }
    }
}

class AnyPlane extends Plane {
    protected function addLog($message)
    {
        $this->blackBox->addLog($message . ' конец сообщения' . PHP_EOL);
    }
}

$plane1 = new Plane();
$plane1->flyProcess();
$plane1->flyAndCrush();

$engineer = new Engineer();
$engineer->takeBox($plane1);
$engineer->decodeBox();

$plane2 = new AnyPlane();
$plane2->flyProcess();
$plane2->flyAndCrush();

$engineer->takeBox($plane2);
$engineer->decodeBox();
