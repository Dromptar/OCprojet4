<?php


if (isset($_GET['url']) && !empty($_GET['url']))
{
    if ($_GET['url']=="home"){
    require_once("controller/home.php");
    }

    elseif ($_GET['url']=="mySpace") {
            require_once("view/connectView.php");
    }

    elseif ($_GET['url']=="register") {
        require_once("view/registerView.php");
    
        if(isset($_POST['inscription'])) {
            require_once("controller/logs.php");

            if (isset($_POST['pseudo']) && !empty($_POST['pseudo']) && htmlspecialchars($_POST['pseudo'])
                && !empty($_POST['pass1']) && !empty($_POST['pass2'])
                && isset($_POST['email']) && htmlspecialchars($_POST['email'])) {
        
                check();
             

                if (($_POST['pass1'] == $_POST['pass2'])
                && preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])) {  

                    var_dump($_POST);
                    register();
                    header('Location: http://localhost/projet4/index.php?url=mySpace');
                
                } else {
                    echo ' Les mots de passes ne correspondent pas et/ou l\'adresse mail n\'est pas valide.';
                }

            } else {
                echo' Veuillez remplir tous les champs';
            }    
        } 
    }

    elseif ($_GET['url']=="blog") {
    
    require_once("controller/blog.php");
    listAllPosts();
    }
    
    elseif ($_GET['url']=="post") {
    
            if (isset($_GET['id']) && $_GET['id'] > 0) {
            require_once("controller/blog.php");
            post();
            }
    }

    elseif ($_GET['url']=='addComment') {
            
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    require_once("controller/blog.php");
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    echo 'Erreur : tous les champs ne sont pas remplis !';
                }
            }
            else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
    }

}

else require_once("controller/home.php");
