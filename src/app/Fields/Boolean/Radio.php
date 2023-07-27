<?php

namespace App\Fields\Boolean;

class Radio extends Boolean
{
    public function render(): string
    {
        return <<<HTML
            <input type="radio" name="{$this->name}">
        HTML;
    }
}