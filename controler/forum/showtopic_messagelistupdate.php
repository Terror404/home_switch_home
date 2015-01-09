<?php

//adding a new message
if (
    isset($_POST['newMessage'])
    and (strlen(trim($_POST['newMessage'])) !== 0)
) {
    if (!isLoggedIn()) {
        $successfullyPostedMessage = false;
        $reasonForPostFailure = "Vous n'êtes pas identifié.";
    }
    elseif ($topicInfo['lockStatus']) {
        $successfullyPostedMessage = false;
        $reasonForPostFailure = "Le sujet est verrouillé.";
    }
    else {
        try {
            $messageInsertion = $DB->prepare("
                INSERT INTO post (date_creation, id_topic, id_user, text)
                VALUES (:creationTime, :topicId, :authorId, :content)
            ");
            $messageInsertion->execute(array(
                'creationTime' => (new DateTime("now"))->format('Y-m-d H:i:s'),
                'topicId' => CURRENT_TOPIC,
                'authorId' => $_SESSION['userId'],
                'content' => $_POST['newMessage']
            ));
            $successfullyPostedMessage = true;
            $reasonForPostFailure = null;
            //updating message list with the added answer
            $messageList = getMessageList($DB, CURRENT_TOPIC);
        }
        catch (exception $e) {
            $successfullyPostedMessage = false;
            $reasonForPostFailure = "L'ajout dans la base de donnée a échoué.";
        }
    }
}

//modifying or deleting an existing message
if (
    isset($_POST['updatedMessage'])
    and (
        (strlen(trim($_POST['updatedMessage'])) != 0)
        or (
            isset($_POST['deleteInstruction'])
            and $_POST['deleteInstruction'] == true
        )
    )
) {
    if (!isLoggedIn()) {
        $successfullyPostedMessage = false;
        $reasonForPostFailure = "Vous n'êtes pas identifié.";
    }
    elseif (!(isset($_GET['p']) AND ((int)$_GET['p'] != 0))) {
        $successfullyPostedMessage = false;
        $reasonForPostFailure = "Pas de message précisé.";
    }
    else {
        //getting data about the message being modified so we can check it
        //exists and its owner is the one modifying it
        $postQuery = $DB->prepare("
            SELECT	user.id AS authorId
            FROM 	post, user
            WHERE	user.id = post.id_user
                    AND post.id = ?
        ");
        $postQuery->execute(array($_GET['p']));
        
        if ($postQuery->rowCount() == 0) {
            $successfullyModifiedMessage = false;
            $reasonForModificationFailure = "Le message précisé n'existe pas.";
        }
        else {
            //One last check to see if the user has the necessary authority
            $postData = $postQuery->fetch();
            if ($postData['authorId'] == $_SESSION['userId'] or $hasModRights) {
                if (isset($_POST['deleteInstruction']) and $_POST['deleteInstruction'] == true) {
                    $lastPost = getLastMessageFromTopic(CURRENT_TOPIC, $DB);
                    if ($lastPost['id'] == $_GET['p']) {
                        try {
                            $deleteQuery = $DB->prepare("
                                DELETE FROM post
                                WHERE id = :postId
                            ");
                            $deleteQuery->execute(array(
                                'postId' => $_GET['p']
                            ));
                            $successfullyDeletedMessage = true;
                            $messageList = getMessageList($DB, CURRENT_TOPIC);
                            $reasonForDeletionFailure = null;
                        }
                        catch (exception $e) {
                            $successfullyDeletedMessage = false;
                            $reasonForDeletionFailure = "La modification de la
                                base de données a échoué.";
                        }
                    }
                    else {
                        $successfullyDeletedMessage = false;
                        $reasonForDeletionFailure = "Vous ne pouvez supprimer
                            que le dernier message.";
                    }
                }
                else {
                    //Updating the message
                    try {
                        $editQuery = $DB->prepare("
                            UPDATE post
                            SET text = :newText
                            WHERE id = :postId
                        ");
                        $editQuery->execute(array(
                            'postId' => $_GET['p'],
                            'newText' => $_POST['updatedMessage']
                        ));
                        $successfullyModifiedMessage = true;
                        //updating message list with the added answer
                        $messageList = getMessageList($DB, CURRENT_TOPIC);
                        $reasonForModificationFailure = null;
                    }
                    catch (exception $e) {
                        $successfullyModifiedMessage = false;
                        $reasonForModificationFailure = "L'ajout dans la base
                            de données a échoué.";
                    }
                }
            }
            else {
                $successfullyModifiedMessage = false;
                $reasonForModificationFailure = "Vous n'avez pas
                    l'autorisation de modifier ce message.";
            }
        }
    }
}