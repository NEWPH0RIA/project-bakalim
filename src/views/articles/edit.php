<h1>Редактирование статьи:<?= $article->getName()?></h1>



<h1><?= $article->getText() ?></h1>
<p>Автор: <?= $article->getAuthor()->getNickname() ?></p>

<form action="" method="POST">
    <label>Название статьи: <input type="text" name="name" value="<?= $article->getName?>"></label><br>
    <label>Текст статьи: <input type="text" name="name" value="<?= $article->getName?>"></label><br>
</form>