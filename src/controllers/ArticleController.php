<?php

namespace src\controllers;
use src\models\Article;
use src\views\View;


class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::findAll();
        $this->view->renderHtml('articles/index.php', ['articles' => $articles]);
    }

    public function view($id)
    {
        $article = Article::getById($id);
        
        if($article !== null){

            $this->view->renderHtml('articles/view.php', ['article' => $article]);
        }else{
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }
        
    }

    public function edit($id)
    {
        $article = Article::getById($id);
        if($article === null){
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        if(!empty($_POST)){
            $article->updateFromArray($_POST);
        }

        $this->view->renderHtml('articles/edit.php', ['article' => $article]);
    }

    public function add()
    {
        $article = new Article;
        $article->setName('Новая статья');
        $article->setText('Новый текст');
        $article->setAuthorId(1);
        $article->save();
        
    }

    public function delete($id)
    {
        $article = Article::getById($id);
        if($article === null){
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $article->delete();
        

    }
}