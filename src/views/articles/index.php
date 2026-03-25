<h1><//h1>
<?php foreach($articles as $article): ?>
    <h1><?= $article->getName()?></h1>
    <h1><?= $article->getText() ?></h1>
    <p>Автор: <?= $article->getAuthor()->getNickname() ?></p>
    <a href="article/<?= 2 ?>"> Подробнее</a>
<?php endforeach; ?>
