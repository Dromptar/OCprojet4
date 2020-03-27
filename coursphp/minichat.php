<?php
 setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon super minichat</title>
    </head>
 
    <body>

    <h1> Bienvenido en ese minichat ! </h1>

    <form action="minichat_post.php" method="POST">
        <p><label>Pseudo : <input type="text" name="pseudo" value="<?php echo $_COOKIE['pseudo'];?>"/> </label></p>
        <p><label>Message : <input type="text" name="message" /> </label></p>
        <p><input type="submit" value="Envoyer" /></p>
    </form>

    <?php
    // Connexion à la base de données
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }

    // Récupération des 10 derniers messages
    $reponse = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0, 10');

    // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
    while ($donnees = $reponse->fetch())
    {
        echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
        var_dump($_POST);
    }

    $reponse->closeCursor();

?>
       
    </body>
</html>
