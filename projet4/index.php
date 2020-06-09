<?php

if(!isset($_SESSION)){

    session_start();
}

require_once("controller/home.php");
require_once("controller/logs.php");
require_once("controller/blog.php");



if (isset($_GET['url']) && !empty($_GET['url']))
{
    if ($_GET['url']=="home") {
        listLastPosts();
    }

    elseif ($_GET['url']=="connection") {
        
        if (isset($_SESSION['connected'])) {
            myAdminSpace();
         
        }
        
        elseif (isset($_POST['connexion'])) {
            logIn();
                      
        } else{
            connection();
        }

    }

    elseif ($_GET['url']=="logout") {
        logout();
    }

    elseif ($_GET['url']=="register") {

        if (isset($_POST['inscription'])) {
            registerCheck();
        } else {
            registerForm();
        }
     
    }
    
            
    elseif ($_GET['url']=="blog") {
        /*var_dump($_POST);*/
        postCheck();
        deleteCheck();
        listAllPosts();

        
    }
    
    elseif ($_GET['url']=="post") {
        displayPostCheck();
    }

    elseif ($_GET['url']=='addComment') {
        commentCheck();
    }

}

else require_once("controller/home.php");