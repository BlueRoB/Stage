<?php

namespace controllers;
class HomeController
{
    public function index()
    {

        require_once __DIR__ . '/../../view/home.php';
        require_once __DIR__ . '/../../view/navbar.php';


    }
}
