<?php

require_once("model/PostManager.php");


function listLastPosts()
{
    $postManager = new PostManager();
    $postManager->getLastPosts();

    $lastPosts = $postManager->getLastPosts();
 
    require_once("view/homeView.php");
}


listLastPosts();



require_once("view/homeView.php");



