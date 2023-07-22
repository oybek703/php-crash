<?php

class Pages extends Controller
{
    public function __construct()
    {
    }

    public function index(): void
    {
        if (isUserLoggedIn()) {
            redirect('/posts');
        }

        $data = [
            'title' => 'Share Posts',
            'description' => 'Simple Social network built on PHP MVC framework.'
        ];
        $this->view('pages/index', $data);
    }

    public function about(): void
    {
        $data = [
            'title' => 'About Us',
            'description' => 'App to share posts with other users.'
        ];

        $this->view('pages/about', $data);
    }

}