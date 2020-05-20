<?php

require_once("controller/home.php");
require_once("controller/logs.php");
require_once("controller/blog.php");

if (isset($_GET['url']) && !empty($_GET['url']))
{
    if ($_GET['url']=="home") {
        listLastPosts();
    }

    elseif ($_GET['url']=="mySpace") {
        mySpace();
    }

    elseif ($_GET['url']=="register") {

        if (isset($_POST['inscription'])) {
            check();
        } else {
            registerForm();
        }
     
    }
            
     
    elseif ($_GET['url']=="blog") {
        listAllPosts();
    }
    
    elseif ($_GET['url']=="post") {
    
        if (isset($_GET['id']) && $_GET['id'] > 0) {
        
        post();
        }
    }

    elseif ($_GET['url']=='addComment') {
            
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    
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
