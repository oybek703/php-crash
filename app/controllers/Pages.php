<?php

class Pages extends Controller
{
    public function __construct()
    {
    }

    public function index(): void
    {
        $data = ['title' => 'Simple MVC Framework'];
        $this->view('pages/index', $data);
    }

    public function about(): void
    {
        $data = ['title' => 'About Us'];
        $this->view('pages/about', $data);
    }

}