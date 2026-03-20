<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <header>
    <div class="header_main">
       <a href="index.html"> <img class="logo" src="images/icons/logoEl.png" alt=""></a>
            <nav class="header_menu">
                <ul class="nav-menu">
                    <li><a href="index.html">Главная</a></li>
                    <li><a href="index.html">О нас</a></li>
                    <li><a href="index.html">Вход</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <?= $content ?>
    </main>

    <footer>
        <div class="copyrt">
<p class="copyright">© 2026 "Умный журнал"</p>
        </div>
    </footer>
</body>
</html>