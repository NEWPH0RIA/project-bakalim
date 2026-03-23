<?php

namespace src\controllers;
use src\views\View;
use src\serveses\DB;

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
        $db = new DB;
        $articles = $db->query("SELECT * FROM `articles`;");
        $this->view->renderHtml('articles/index.php', ['articles' => $articles]);
    }

    public function sayHello($name)
    {
        echo 'Привет, ' . $name;
    }
}