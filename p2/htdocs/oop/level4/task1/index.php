<?php

include $_SERVER['DOCUMENT_ROOT'] . '/oop/level4/task1/autoload.php';

use task1\Manager;
use task1\Instrument;
use task1\Screwdriver;
use task1\Hammer;
use task1\Papers;
use task1\Paper;
use task1\Document;

$manager = new Manager();
$manager->place(new Paper());
$manager->place(new Document());
$manager->place(new Screwdriver());
$manager->place(new Hammer());
$manager->place('anyItem');
