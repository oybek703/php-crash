<?php

namespace App;

class Model
{
    protected Db $db;
    public function __construct()
    {
        $this->db = App::db();
    }
}