<?php

declare(strict_types=1);


use App\{CoffeeMaker, LatteMaker, CappuccinoMaker, AllInOneCoffeeMaker};

require_once __DIR__ . '/../vendor/autoload.php';

$coffeeMaker = new CoffeeMaker();
$latteMaker = new LatteMaker();
$cappuccinoMaker = new CappuccinoMaker();
$allInOneCoffeeMaker = new AllInOneCoffeeMaker();

$coffeeMaker->makeCoffee();

$latteMaker->makeCoffee();
$latteMaker->makeLatte();

$cappuccinoMaker->makeCoffee();
$cappuccinoMaker->makeCappuccino();

$allInOneCoffeeMaker->makeCoffee();
$allInOneCoffeeMaker->makeCappuccino();
$allInOneCoffeeMaker->makeLatte();