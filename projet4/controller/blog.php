<?php

require_once("model/PostManager.php");

function listAllPosts()
{
    $postManager = new PostManager();
    $postManager->getAllPosts();

    $allPosts = $postManager->getAllPosts();

 
    require_once("view/blogView.php");
}

listAllPosts();


