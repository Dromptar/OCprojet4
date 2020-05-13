<?php

require_once("model/LogsManager.php");


function check()
{
    $logsManager = new LogsManager();
    $logsManager->logsCheck();

    $isValid = $logsManager->logsCheck();

}


function register()
{
    $logsManager = new LogsManager();
    $logsManager->addMember();

    $newMember = $logsManager->addMember();

}

