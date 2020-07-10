<?php

require_once("model/PostManager.php");
require_once("model/CommentManager.php");
require_once("controller/logs.php");
require_once("controller/blogComments.php");

/**
 * listAllPosts
 * recupere dans la bdd tous les posts et les affiche sur le blog par ordre de date
 * @return void
 */
function listAllPosts()
{
    $postManager = new PostManager();
    $allPosts = $postManager->getAllPosts();

    require_once("view/blogView.php");
}


/**
 * displayPost
 * recupere 1 post via son ID et l'affiche sur la page postView
 * @param  int $id
 * @return void
 */
function displayPost($id)
{
    if (isset($id) && $id > 0) {
        $postManager = new PostManager();
        $commentManager = new CommentManager();

        $post = $postManager->getPost($id);
        $comments = $commentManager->getComments($id);

        require('view/postView.php');
    }
}



/**
 * post
 * controle que les champs soient bien remplis et execute post en publiant le chapitre
 * @return void
 */
function post()
{
    if ( isset($_POST['author']) && !empty($_POST['author'])
        && isset($_POST['title']) && !empty($_POST['title'])
        && isset($_POST['quote']) && !empty($_POST['quote'])
        && isset($_POST['texteditor']) && !empty($_POST['texteditor'])) {

        $postManager = new PostManager();
        $newPost = $postManager->newPost();;
    }
}


/**
 * postDelete
 * supprime un post un fonction de son ID
 * @param  mixed $deletePost
 * @return void
 */
function postDelete($deletePost)
{
    if (isset($deletePost) && $deletePost > 0) {
        $postManager = new PostManager();
        $deletePost = $postManager->deletePost();
    }
}



/**
 * updateView
 * recupere  un post pour l afficher dans l'adminPostView pour pouvoir le mettre a jour
 * @param  mixed $id
 * @return void
 */
function updateView($id)
{
    $postManager = new PostManager();
    $post = $postManager->getPost($id);

    require_once('view/adminPostView.php');
}


/**
 * updatePost
 * controle que les champs soient bien remplis et RE publie le post avec les nouvelles infos
 * @return void
 */
function updatePost()
{
    if ( isset($_POST['author']) && !empty($_POST['author'])
        && isset($_POST['title']) && !empty($_POST['title'])
        && isset($_POST['quote']) && !empty($_POST['quote'])
        && isset($_POST['texteditor']) && !empty($_POST['texteditor'])) {

        $postManager = new PostManager();
        $updatePost = $postManager->updatePost();
        header('Location: ' .$GLOBALS['nomDeDomaine']. '?url=blog');

    }
}



