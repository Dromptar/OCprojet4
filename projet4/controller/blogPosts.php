<?php

require_once("model/PostManager.php");
require_once("model/CommentManager.php");
require_once("controller/logs.php");
require_once("controller/blogComments.php");

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

    header('Location: http://dromptar.com/projet4/index.php?url=post&id=' .$_GET['id']);
}