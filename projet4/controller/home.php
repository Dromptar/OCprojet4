<?php

require_once("model/PostManager.php");


function listPosts()
{
    $postManager = new PostManager();
    $postManager->getPosts();

    $posts = $postManager->getPosts();
 
    require_once("view/homeView.php");
}


listPosts();



require_once("view/homeView.php");


