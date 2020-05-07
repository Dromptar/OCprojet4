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
                <li><i class="fas fa-home"></i><a href="index.php?url=home">Home</a></li>
                <li><a href="index.php?url=blog">Les chapitres</a></li>
                <li><a href="index.php?url=admin">Espace Admin</a></li>
            </ul>

        <ul id="social">
            <li><i class="fab fa-facebook-f"></i></li>
            <li><i class="fab fa-twitter"></i></li>
            <li><i class="fab fa-instagram"></i></li>
        </ul>

        </nav>

        <?= $content ?>

    </body>
</html>