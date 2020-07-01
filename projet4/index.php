<?php

if (!isset($_SESSION)) {

    session_start();
}

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
                commentDeleteCheck();
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
            registerCheck();
        } else {
            registerForm();
        }
    } elseif ($_GET['url'] == "blog") {

        if (isset($_GET['deletePost'])) {
            postDeleteCheck();
            listAllPosts();
        } else if (isset($_GET['id'])) {
            updateView();

            if (isset($_GET['action']) && ($_GET['action'] == 'update')) {
                updateCheck();
            }
        } else {
            postCheck();
            listAllPosts();
        }
    } elseif ($_GET['url'] == "post") {
        displayPostCheck();

        if (isset($_GET['action']) && ($_GET['action'] == 'flag')) {
            addFlag();
        }
    } elseif ($_GET['url'] == 'addComment') {
        commentCheck();
    }
} else require_once("controller/home.php");
