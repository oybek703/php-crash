<?php

class Pages
{
    public function __construct()
    {
    }

    public function index() {
    }

    public function about($id) {
        echo $id;
        echo 'This is about';
    }

}