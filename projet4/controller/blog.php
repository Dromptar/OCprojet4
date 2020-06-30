<?php

require_once("model/PostManager.php");
require_once("model/CommentManager.php");
require_once("controller/logs.php");

function listAllPosts()
{
    $postManager = new PostManager();
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

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/postView.php');
}


function postCheck()
{

    if (
        isset($_POST['author']) && !empty($_POST['author'])
        && isset($_POST['title']) && !empty($_POST['title'])
        && isset($_POST['quote']) && !empty($_POST['quote'])
        && isset($_POST['texteditor']) && !empty($_POST['texteditor'])
    ) {
        post();
    }
}

function post()
{
    $postManager = new PostManager();
    $newPost = $postManager->newPost();
}

function postDeleteCheck()
{
    if (isset($_GET['deletePost']) && $_GET['deletePost'] > 0) {
        deletePost();
    }
}

function deletePost()
{
    $postManager = new PostManager();
    $deletePost = $postManager->deletePost();
}

function updateView()
{
    $postManager = new PostManager();
    $post = $postManager->getPost($_GET['id']);

    require_once('view/adminPostView.php');
}

function updateCheck()
{
    if (
        isset($_POST['author']) && !empty($_POST['author'])
        && isset($_POST['title']) && !empty($_POST['title'])
        && isset($_POST['quote']) && !empty($_POST['quote'])
        && isset($_POST['texteditor']) && !empty($_POST['texteditor'])
    ) {

        updatePost();
    }
}

function updatePost()
{
    $postManager = new PostManager();
    $updatePost = $postManager->updatePost();

    header('Location: http://localhost/projet4/index.php?url=post&id=' .$_GET['id']);
}

function listAllComments()
{
    $commentManager = new CommentManager();
    $allComments = $commentManager->allComments();

    myAdminSpace();
}

function commentDeleteCheck()
{
    if (isset($_GET['deleteComment']) && $_GET['deleteComment'] > 0) {
        deleteComment();
    }
}

function deleteComment()
{
    $CommentManager = new CommentManager();
    $deleteComment = $CommentManager->deleteComment();
}

function commentCheck()
{

    if (isset($_GET['id']) && $_GET['id'] > 0) {
        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
            addComment($_GET['id'], $_POST['author'], $_POST['comment']);
        } else {
            echo 'Erreur : tous les champs ne sont pas remplis !';
        }
    } else {
        echo 'Erreur : aucun identifiant de billet envoyé';
    }
}

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    } else {
        header('Location: index.php?url=post&id=' . $postId);
    }
}



function addFlag()
{
    $commentManager = new CommentManager();
    $reportComment = $commentManager->addFlag();

    echo "<script>alert(\"Commentaire signalé !\")</script>";
    
}

