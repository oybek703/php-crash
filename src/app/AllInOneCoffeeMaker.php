<?php

namespace App;

class AllInOneCoffeeMaker extends CoffeeMaker
{
    use CappuccinoTrait;
    use LatteMakerTrait {
        CappuccinoTrait::makeLatte insteadof LatteMakerTrait;
    }
}