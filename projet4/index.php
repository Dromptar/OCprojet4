<?php

if (!isset($_SESSION)) {

    session_start();
}

require_once("config.php");
require_once("controller/home.php");
require_once("controller/logs.php");
require_once("controller/blogPosts.php");
require_once("controller/blogComments.php");



if (isset($_GET['url']) && !empty($_GET['url'])) {
    if ($_GET['url'] == "home") {
        listLastPosts();
    } elseif ($_GET['url'] == "connection") {
        if (isset($_SESSION['connected'])) {
            
            if (isset($_GET['deleteComment'])) {
                commentDelete($_GET['deleteComment']);
                listAllComments();
            } else {
                listAllComments();
            }
        } elseif (isset($_POST['connexion'])) {
            logIn();

        } else {
            connection();  
        }

    } elseif ($_GET['url'] == "logout") {
        logout();
    } elseif ($_GET['url'] == "register") {

        if (isset($_POST['inscription'])) {
            signUp();
        } else {
            registerForm();
        }
    } elseif ($_GET['url'] == "blog") {

        if (isset($_GET['deletePost'])) {
            postDelete($_GET['deletePost']);
            listAllPosts();
        } else if (isset($_GET['id'])) {
            updateView($_GET['id']);

            if (isset($_GET['action']) && ($_GET['action'] == 'update')) {
                updatePost();
            }
        } else {
            post();
            listAllPosts();
        }
    } elseif ($_GET['url'] == "post") {
        displayPost($_GET['id']);

        if (isset($_GET['action']) && ($_GET['action'] == 'flag')) {
            addFlag($_GET['comId']);
        }
    } elseif ($_GET['url'] == 'addComment') {
        commentCheck($_GET['id'], $_POST['author'], $_POST['comment']);
    }
} else require_once("controller/home.php");
