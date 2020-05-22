

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <meta name="description" content="test" />
        <meta name="keywords" content="bip bip" />
        <meta name="author" content="nom" />
        <title><?= $title ?></title>
        <link href="public/css/main.css" rel="stylesheet" />
        <link href="public/images/bookicon.ico" rel="favicon" />
        <script src="https://kit.fontawesome.com/75492b6bf6.js"></script>
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    </head>
        
    <body>

        <nav id="menu">

            <div id="logo"><a href="index.php?url=home"><img src="public/images/book.png" alt="logo"></a></div>
         

            <ul id="nav-tabs">
                <li><i class="fas fa-home"></i><a href="index.php?url=home">Home</a></li>
                <li><a href="index.php?url=blog">Les chapitres</a></li>
                <li><a href="index.php?url=mySpace">Mon espace</a></li>
            </ul>

            <ul id="nav-social">
                <li><i class="fab fa-facebook-f"></i></li>
                <li><i class="fab fa-twitter"></i></li>
                <li><i class="fab fa-instagram"></i></li>
            </ul>

        </nav>

        <?= $content ?>

        <footer>

        <ul id="foot-tabs">
                <li>Plan du site</li>
                <li><a href="index.php?url=home">Home</a></li>
                <li><a href="index.php?url=blog">Les chapitres</a></li>
                <li><a href="index.php?url=admin">Connexion</a></li>
            </ul>

            <ul id="foot-social">
                <li>Suivez moi !</li>
                <li><i class="fab fa-facebook-f"> Facebook</i></li>
                <li><i class="fab fa-twitter"> Twitter</i></li>
                <li><i class="fab fa-instagram"> Instagram</i></li>
            </ul>

            <ul id="divers">
                <li>Espace Admin</li>
                <li>Contact</li>
            </ul>
            
        
        </footer>

    </body>
</html>