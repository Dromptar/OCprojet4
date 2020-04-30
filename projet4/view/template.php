<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/main.css" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/75492b6bf6.js"></script>
    </head>
        
    <body>

        <nav id="menu">
            <ul id="tabs">
                <li><i class="fas fa-home"></i><a href="">Home</a></li>
                <li><a href="">Le blog</a></li>
                <li><a href="">Mon espace</a></li>
                <li><a href="">Déconnexion</a></li>
            </ul>

        <ul id="social">
            <li><i class="fab fa-facebook-f"></i></li>
            <li><i class="fab fa-twitter"></i></li>
            <li><i class="fab fa-instagram"></i></li>
        </ul>

        </nav>

        <?= $content ?>

        <script src="public/js/menu.js"></script>

    </body>
</html>