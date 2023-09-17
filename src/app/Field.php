<?php

namespace App;

abstract class Field implements RenderAble
{
    public function __construct(protected string $name)
    {
    }
}