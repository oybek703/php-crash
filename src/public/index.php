<?php

declare(strict_types=1);


use App\{CoffeeMaker, LatteMaker, CappuccinoMaker, AllInOneCoffeeMaker};

require_once __DIR__ . '/../vendor/autoload.php';

$coffeeMaker = new CoffeeMaker();
$latteMaker = new LatteMaker();
$cappuccinoMaker = new CappuccinoMaker();
$allInOneCoffeeMaker = new AllInOneCoffeeMaker();

$coffeeMaker->makeCoffee();
echo "</br>";
$latteMaker->makeCoffee();
echo "</br>";
$latteMaker->makeLatte();
echo "</br>";

$cappuccinoMaker->makeCoffee();
echo "</br>";
$cappuccinoMaker->makeCappuccino();
echo "</br>";

$allInOneCoffeeMaker->makeCoffee();
echo "</br>";
$allInOneCoffeeMaker->makeCappuccino();
echo "</br>";
$allInOneCoffeeMaker->makeLatte();