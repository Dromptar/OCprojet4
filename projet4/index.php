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
        
        if (isset($_POST['connexion'])) {
            logIn();
        } else {
            mySpace();
        }

    }

    elseif ($_GET['url']=="register") {

        if (isset($_POST['inscription'])) {
            registerCheck();
        } else {
            registerForm();
        }
     
    }
    
            
    elseif ($_GET['url']=="blog") {
        listAllPosts();
    }
    
    elseif ($_GET['url']=="post") {
        postCheck();
    }

    elseif ($_GET['url']=='addComment') {
        commentCheck();
    }

}

else require_once("controller/home.php");