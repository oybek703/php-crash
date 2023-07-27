<?php
declare(strict_types=1);
namespace App;

final class Toaster
{
    public array $slices =[];
    public int $size =2;

    public function __construct()
    {
    }

}

class ToasterPro extends Toaster {

}