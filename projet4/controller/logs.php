<?php

require_once("model/LogsManager.php");


function check()
{
    $logsManager = new LogsManager();
    /*$logsManager->logsCheck();*/
    $isValid = $logsManager->logsCheck();
    if ($isValid -> fetch())
        {
            echo 'Pseudonyme et/ou email déjà utilisé. !<br />';
            die();
        }
}


function register()
{
    $logsManager = new LogsManager();
    $logsManager->addMember();

    $newMember = $logsManager->addMember();

    require_once("view/connectView.php");

}

