<?php

define("__ROOT__", dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__."/modele/forum/core.php");
require_once(__ROOT__."/modele/pdoDatabaseRef.php");
require_once(__ROOT__."/modele/forum/showtopic_model.php");

if (TOPIC_IS_SET) {
    $messageList = getMessageList($DB, CURRENT_TOPIC);
    if ($messageList->rowCount() == 0) {
        $error = "Le sujet demandé n'existe pas.";
        $messageList->closeCursor();
        include(__ROOT__."/view/forum/error.php");
    }
    else {
        //Calculating which page we're on and how many there are
        define("NUMBER_OF_PAGES", getPage($messageList->rowCount(), MESSAGES_PER_PAGE));
        if (!isset($firstMessage) OR $firstMessage > $messageList->rowCount()) {
            $firstMessage = 0;
            define("CURRENT_PAGE", 1);
        }
        else {
            define("CURRENT_PAGE", getPage($firstMessage, MESSAGES_PER_PAGE));
        }
        
        if (isLoggedIn()) {
            $hasModRights = userHasModeratorRights($_SESSION['userId']);
        }
        
        $topicInfo = getTopicInfo($DB, CURRENT_TOPIC);
        include("showtopic_messagelistupdate.php");
        include("showtopic_topicmodactions.php");
        $messageTable = $messageList->fetchAll();
        include(__ROOT__."/view/forum/showtopic_view.php");
    }
}
else {
    $error = "Pas de sujet précisé.";
    include(__ROOT__."/view/forum/error.php");
}