<?php

require_once("model/LogsManager.php");

function registerForm() 
{
    require_once("view/registerView.php");
}



function signUp()
{
    $logsManager = new LogsManager();
    
    $newMember = $logsManager->addMember();

}

function check() 
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
                    require_once("view/adminView.php");
                             
                } else {
                    echo ' Les mots de passes ne correspondent pas et/ou l\'adresse mail n\'est pas valide.';
                }

        } else {
                echo' Veuillez remplir tous les champs';
        }    
} 




