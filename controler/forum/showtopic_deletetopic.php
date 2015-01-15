<?php

//Checking that the topic can be deleted and the user has authorisation
if (userHasModeratorRights($_SESSION['userId'], $DB)) {
    $deleteOk = true;
}
else {
    $deleteCheckQuery = $DB->query("
        SELECT  post.id_user AS author
        FROM    post
        WHERE   post.id_topic =" . CURRENT_TOPIC . "
        LIMIT   2
    ");
    if ($deleteCheckQuery->rowCount() == 1) {
        $firstPost = $deleteCheckQuery->fetch();
        $deleteOk = ($_SESSION['userId'] == $firstPost['author']);
        $reasonForTopicDeletionFailure = "Vous n'êtes pas le créateur du sujet.";
    }
    else {
        $reasonForTopicDeletionFailure = "Vous ne pouvez pas supprimer ce "
                . "sujet car il possède plus d'un message.";
        $deleteOk = false;
    }
}

if ($deleteOk) {
    try {
        deleteTopic(CURRENT_TOPIC, $DB);
        $topicDeletionSuccessful = true;
    }
    catch (Exception $e) {
        $reasonForDeletionFailure = "Erreur lors de la modification de la base"
                . " de données.";
        $topicDeletionSuccessful = false;
    }
}
else {
    //error message has already been set
    $topicDeletionSuccessful = false;
}

if ($topicDeletionSuccessful) {
    include(__ROOT__."/view/forum/deletetopic_view.php");
}