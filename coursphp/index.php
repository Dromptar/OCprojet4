<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link href="style.css" rel="stylesheet" />
        <title>Mon super blog</title>
    </head>
 
    <body>

    <h1> Bienvenidos en el blog de los boludos ! </h1>
    <p> Los ultimos posts : </p>

   
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

    // Récupération des 10 derniers billets
    $req = $bdd->query('SELECT id, auteur, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\')
     AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');

    // Affichage de chaque billet (toutes les données sont protégées par htmlspecialchars)
    while ($donnees = $req->fetch())
    {
    ?>
    <div class="news">

        <h3>
            <?php echo htmlspecialchars($donnees['titre']) . ' - ' . htmlspecialchars($donnees['auteur']); ?>
            <em>le <?php echo $donnees['date_creation_fr']; ?></em>
        </h3>

        <p>
            <?php
            // On affiche le contenu du billet
            echo nl2br(htmlspecialchars($donnees['contenu']));
            ?>
            <br />
            <em><a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a></em>
        </p>

    </div>
    
    <?php
    } // Fin de la boucle des billets
        $req->closeCursor();
    ?>
        
       
    </body>
</html>
