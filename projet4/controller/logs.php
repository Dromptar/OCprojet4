<?php

require_once("model/LogsManager.php");


function check()
{
    $logsManager = new LogsManager();
    
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
    
    $newMember = $logsManager->addMember();

    require_once("view/connectView.php");

}

