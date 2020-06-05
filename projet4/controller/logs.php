<?php

require_once("model/LogsManager.php");

function registerForm() 
{
    require_once("view/registerView.php");
}

function myAdminSpace() {

    require_once("view/adminView.php");

}

function signUp()
{
    $logsManager = new LogsManager();
    
    $newMember = $logsManager->addMember();

    myAdminSpace();

}

function registerCheck() 
{
    $logsManager = new LogsManager();
    
    $isValid = $logsManager->logsCheck();

    if (isset($_POST['pseudo']) && !empty($_POST['pseudo']) && htmlspecialchars($_POST['pseudo'])
        && !empty($_POST['pass1']) && !empty($_POST['pass2'])
        && isset($_POST['email']) && htmlspecialchars($_POST['email'])) {
           
        if ($isValid -> fetch())
        {
            echo 'Pseudonyme et/ou email déjà utilisé. !<br />';
            die();
        }
        
            if (($_POST['pass1'] == $_POST['pass2'])
                && preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])) {  
                    
                    signUp();
                             
                } else {
                    echo ' Les mots de passes ne correspondent pas et/ou l\'adresse mail n\'est pas valide.';
                }

        } else {
                echo' Veuillez remplir tous les champs';
        }    
} 



function logIn(){

    $logsManager = new LogsManager();
    
    $resultat = $logsManager->connectMember();
    
    $score = $resultat->fetch();
    $isPasswordCorrect = password_verify($_POST['pass'], $score['pass']);
    
    if ($isPasswordCorrect) {
               
            $pseudo = ($_POST['pseudo']);
            $_SESSION['id'] = $score['id'];
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['connected'] = $_POST['pseudo'] ;
            require_once("view/adminView.php");
        }
            else {
            echo 'Mauvais identifiant ou mot de passe !';
            }
}


function logOut() {

   

    // Suppression des variables de session et de la session
    $_SESSION = array();
    session_destroy();
    header('Location: http://localhost/projet4/index.php?url=connection');


    // Suppression des cookies de connexion automatique
   /* setcookie('login', '');
    setcookie('pass_hache', '');*/

}




