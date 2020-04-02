<?php

//Réception des donnees du formulaire
$pseudo = $_POST['pseudo'];
$mail = $_POST['email'];
$mdp1 = $_POST['pass1'];
$mdp2 = $_POST['pass2'];


if (isset($_POST['pseudo']) && htmlspecialchars($_POST['pseudo'])
{
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

$request = $bdd->prepare("SELECT pseudo FROM membres WHERE pseudo= ?");
$request -> execute(array($_POST['pseudo']));

    if ($donnees = $request ->fetch())
    {
    echo 'Il y a déjà une personne qui utilise ce pseudo !<br />';
    die();
    }
}

/*if (isset($_POST['pseudo']) && htmlspecialchars($_POST['pseudo'])
    && !empty($_POST['pass1']) && !empty($_POST['pass2'])
    && isset($_POST['email']) && htmlspecialchars($_POST['email'])
    && preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])
    && ($_POST['pass1'] == $_POST['pass2']))
{
    echo '<p> Bienvenue parmi nous  ' . $_POST['pseudo'] . ' ! </p>';
}

else
{
    echo ' Veuillez remplir correctement tous les champs.';
}*/



// Hachage du mot de passe
$pass_hache = password_hash($_POST['pass1'], PASSWORD_DEFAULT);

// Insertion
$req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(:pseudo, :pass, :email, CURDATE())');
$req->execute(array(
    'pseudo' => $pseudo,
    'pass' => $pass_hache,
    'email' => $email));

?>