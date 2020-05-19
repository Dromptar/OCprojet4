<?php

require_once("controller/home.php");
require_once("controller/logs.php");

if (isset($_GET['url']) && !empty($_GET['url']))
{
    if ($_GET['url']=="home") {
        listLastPosts();
    }

    elseif ($_GET['url']=="mySpace") {
        mySpace();
    }

    elseif ($_GET['url']=="register") {
        registerForm();
    }
            
    elseif (isset($_POST['inscription'])) {
            
        check();
        
            if ($_GET['url']=="admin") {
                
            adminSpace();
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
