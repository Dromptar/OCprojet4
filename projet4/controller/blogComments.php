<?php

require_once("model/PostManager.php");
require_once("model/CommentManager.php");
require_once("controller/blogPosts.php");
require_once("controller/logs.php");

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
        header('Location: ' .$GLOBALS['nomDeDomaine'].  '?url=post&id=' . $postId);
    }
}



function addFlag()
{
    $commentManager = new CommentManager();
    $reportComment = $commentManager->addFlag();

    echo "<script>alert(\"Commentaire signalé !\")</script>";
    
}