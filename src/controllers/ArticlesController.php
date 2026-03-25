<?php

namespace src\controllers;
use src\models\Articles;
use src\views\View;


class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Articles::findAll();
        $this->view->renderHtml('articles/index.php', ['articles' => $articles]);
    }

    public function view($id)
    {
        $article = Articles::getById($id);
        
        if($article !== null){

            $this->view->renderHtml('articles/view.php', ['article' => $article]);
        }else{
            $this->view->renderHtml('errors/404.php', [], 404);
        }
        
    }

    public function edit($id)
    {
        $article = Articles::getById($id);
        if($article === null){
            $this->view->renderHtml('errors/404.php', [], 404);
        }
        $this->view->renderHtml('articles/edit.php', ['article' => $article]);
    }
}