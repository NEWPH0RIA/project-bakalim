
<?php foreach($articles as $article): ?>
    <h1><?= $article->getName()?></h1>
    <h1><?= $article->getText() ?></h1>
    <h1><?= $author ?></h1>
    <a href="article/<?= $article->getId() ?>">Подробнее</a>
<?php endforeach; ?>
