<?php

define("__ROOT__", dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__."/modele/forum/core.php");
require_once(__ROOT__."/modele/pdoDatabaseRef.php");
require_once(__ROOT__."/modele/forum/showtopic_model.php");

if (TOPIC_IS_SET) {
    if ($messageList->rowCount() == 0) {
        $error = "Le sujet demandé n'existe pas.";
        $messageList->closeCursor();
        include(__ROOT__."/view/forum/error.php");
    }
    else {
        if (isset($_POST['deleteTopicInstruction']) AND $_POST['deleteTopicInstruction'] == true) {
            include("showtopic_deletetopic.php");
        }
        if (!isset($topicDeletionSuccessful) OR !$topicDeletionSuccessful) {
            include("showtopic_messagelistupdate.php");
            include("showtopic_topicmodactions.php");
            $messageTable = $messageList->fetchAll();
            include(__ROOT__."/view/forum/showtopic_view.php");
        }
    }
}
else {
    $error = "Pas de sujet précisé.";
    include(__ROOT__."/view/forum/error.php");
}