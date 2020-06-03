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

function displayPostCheck() 
{
    if (isset($_GET['id']) && $_GET['id'] > 0) { 
         
        displayPost(); 
    } 

}

function displayPost()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager -> getPost($_GET['id']);
    $comments = $commentManager -> getComments($_GET['id']);

    require('view/postView.php');
}


function postCheck()
{
    
    if (isset($_POST['author']) && !empty($_POST['author']) && htmlspecialchars($_POST['author'])
    && isset($_POST['title']) && !empty($_POST['title']) && htmlspecialchars($_POST['title'])
    && isset($_POST['quote']) && !empty($_POST['quote']) && htmlspecialchars($_POST['quote'])
    && isset($_POST['content']) && !empty($_POST['content']) && htmlspecialchars($_POST['content'])) {
        
        var_dump($_POST);
        post();
        
    
    }
    
}

function post() 
{
    $postManager = new PostManager();
    $postManager->newPost();
    
    $newPost = $postManager -> newPost();
    
}

function commentCheck() 
{

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


