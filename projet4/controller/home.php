<?php

require_once("model/PostManager.php");


/**
 * listLastPosts
 * recupere les 3 derniers posts publiés et les affiche
 * @return void
 */
function listLastPosts()
{
    $postManager = new PostManager();
    $postManager->getLastPosts();

    $lastPosts = $postManager->getLastPosts();
 
    require_once("view/homeView.php");
}


/**
 * connection
 * affiche la vue de l'ecran de connexion
 * @return void
 */
function connection()
{
    require_once("view/connectView.php");
}











