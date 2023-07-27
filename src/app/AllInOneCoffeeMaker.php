<?php

namespace App;

class AllInOneCoffeeMaker extends CoffeeMaker
{
    use CappuccinoTrait {
        CappuccinoTrait::makeLatte  insteadof  LatteTrait;
        CappuccinoTrait::makeCappuccino as public;
    }
    use LatteTrait;
}