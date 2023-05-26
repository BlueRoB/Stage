<?php

namespace controllers;

class HomeController
{
    public function index()
    {
        $requestedPage = $_SERVER['REQUEST_URI'];
        $viewPath = '';

        switch ($requestedPage) {
            case '/WEB/Stage/public/':
                $viewPath = __DIR__ . '/../../view/home.php';
                break;
            case '/WEB/Stage/public/formulaire.php':
                $viewPath = __DIR__ . '/../../view/formulaire.php';
                break;
            default:
                break;
        }

        require_once $viewPath;

        //require_once $viewPath;
        //require_once __DIR__ . '/../../view/navbar.php';
    }
}
