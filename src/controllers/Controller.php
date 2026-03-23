<?php

namespace src\controllers;
use src\views\View;
use src\serveses\DB;

class Controller
{
    public $view;
    public $layout = 'default';

    public function __construct()
    {
        $this->view = new View($this->layout);
    }

    
}