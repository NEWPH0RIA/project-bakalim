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
            $author = Users::getById($article->getAuthorId);
            $this->view->renderHtml('articles/view.php', ['article' => $article, 'author' => $author]);
        }else{
            $this->view->renderHtml('errors/404.php', [], 404);
        }
        
    }
}