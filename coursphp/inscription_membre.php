<?php


$pseudo = $_POST['pseudo'];
$mail = $_POST['email'];


// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Vérification de la validité des informations

if (isset($_POST['inscription']))
{
    
    if ((isset($_POST['pseudo']) && htmlspecialchars($_POST['pseudo'])
        && !empty($_POST['pass1']) && !empty($_POST['pass2']))
        && isset($_POST['email']) && htmlspecialchars($_POST['email']))
    {
            $request = $bdd->prepare("SELECT pseudo FROM membres WHERE pseudo= ?");
            $request -> execute(array($_POST['pseudo']));

            if ($donnees = $request ->fetch())
            {
            echo 'Il y a déjà une personne qui utilise ce pseudo !<br />';
            die();
            }
        
        if (($_POST['pass1'] == $_POST['pass2']) 
            && preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']))
        {

            $pass_hache = password_hash($_POST['pass1'], PASSWORD_DEFAULT); 
            $req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(?, ?, ?, CURDATE())');
            $req->execute(array(
                                'pseudo' => $pseudo,
                                'pass' => $pass_hache,
                                'email' => $mail
                                ));

        } else {
            echo ' Les mots de passes ne correspondent pas et/ou l\'adresse mail n\'est pas valide.';
        }

    } else { 
        
        echo ' Veuillez saisir tous les champs !';
    }

}