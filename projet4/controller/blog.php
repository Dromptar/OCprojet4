<?php

require_once("model/PostManager.php");
require_once("model/CommentManager.php");

function listAllPosts()
{
    $postManager = new PostManager();
    $postManager->getAllPosts();

    $allPosts = $postManager->getAllPosts();

 
    require_once("view/blogView.php");
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager -> getPost($_GET['id']);
    $comments = $commentManager -> getComments($_GET['id']);

    require('view/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager -> postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?url=post&id=' . $postId);
    }
}


