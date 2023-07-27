<?php

declare(strict_types=1);

namespace App\Fields;

abstract class Field implements RenderAble
{
    public function __construct(protected string $name)
    {
    }
}