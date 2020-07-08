<?php

require_once("model/PostManager.php");
require_once("model/CommentManager.php");
require_once("controller/blogPosts.php");
require_once("controller/logs.php");

/**
 * listAllComments
 * recupere et affiche tous les commentaires sur la page postView
 * @return void
 */
function listAllComments()
{
    $commentManager = new CommentManager();
    $allComments = $commentManager->allComments();
    require_once("view/adminView.php"); 

}

/**
 * commentDelete
 * supprime le commentaire en fonction de son ID dans l'interface de l'admin
 * @param  int $deleteComment
 * @return void
 */
function commentDelete($deleteComment)
{
    if (isset($_GET['deleteComment']) && $_GET['deleteComment'] > 0) {
        $CommentManager = new CommentManager();
        $deleteComment = $CommentManager->deleteComment($deleteComment);
    }
}

/**
 * commentCheck
 * Controle que les champs soient bien remplis dans le formulaire
 *  de commentaire et appelle addComment()
 * @param  int $postId
 * @param  string $author
 * @param  string $comment
 * @return void
 */
function commentCheck($postId, $author, $comment)
{

    if (isset($_GET['id']) && $_GET['id'] > 0) {
        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
            addComment($postId, $author, $comment);
        } else {
            echo 'Erreur : tous les champs ne sont pas remplis !';
        }
    } else {
        echo 'Erreur : aucun identifiant de billet envoyé';
    }
}

/**
 * addComment
 * publie le commentaire et rafraichie la page avec un message de confirmation
 * @param  int $postId
 * @param  string $author
 * @param  string $comment
 * @return void
 */
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

/**
 * addFlag
 * Signal un commentaire et averti le user que le report est effectif. Incremente egalement de 1
 * le champs flag de la BDD comments. A partir de 5 flags, le commentaire apparait dans l'interface admin
 * afin d'etre supprimé 
 * @param  int $comId
 * @return void
 */
function addFlag($comId)
{
    $commentManager = new CommentManager();
    $reportComment = $commentManager->addFlag($comId);

    echo "<script>alert(\"Commentaire signalé !\")</script>";
    
}