<?php

namespace src\controllers;
use src\views\View;
use src\models\Article;

class MainController extends Controller
{
    public $view;
    public $layout = 'default';

    public function __construct()
    {
        $this->view = new View($this->layout);
    }

    public function main()
    {

        $this->view->renderHtml('articles/index.php');
    }

    public function sayHello($name)
    {
        echo 'Привет, ' . $name;
    }
}