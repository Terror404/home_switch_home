<?php

if (!defined("__ROOT__")) {
    define("__ROOT__", dirname(dirname(dirname(__FILE__))));
}
require_once(__ROOT__."/modele/pdoDatabaseRef.php");
require_once(__ROOT__."/modele/forum/core.php");
require_once(__ROOT__."/modele/forum/showcategory_model.php");

if (CATEGORY_IS_SET) {
    if (CATEGORY_EXISTS) {
        //adding new topic
        if (ADDING_NEW_TOPIC) {
            if (isLoggedIn()) {
                try {
                    $topicInsertion = $DB->prepare("
                        INSERT INTO topic(date_creation, id_category, id_user, locked, title)
                        VALUES(:creationTime, :categoryId, :authorId, :lockedStatus, :title)
                    ");
                    $topicInsertion->execute(array(
                        'creationTime' => (new DateTime("now"))->format('Y-m-d H:i:s'),
                        'categoryId' => CURRENT_CATEGORY,
                        'authorId' => $_SESSION['userId'],
                        'lockedStatus' => false,
                        'title' => $_POST['topicTitle']
                    ));

                    $newTopicId = $DB->lastInsertId();
                    $messageInsertion = $DB->prepare("
                        INSERT INTO post(date_creation, id_topic, id_user, text)
                        VALUES(:creationTime, :topicId, :authorId, :content)
                    ");
                    $messageInsertion->execute(array(
                        'creationTime' => (new DateTime("now"))->format('Y-m-d H:i:s'),
                        'topicId' => $newTopicId,
                        'authorId' => $_SESSION['userId'],
                        'content' => $_POST['openingPost']
                    ));
                    $successfullyAddedTopic = true;
                }
                catch (exception $e) {
                    $successfullyAddedTopic = false;
                    $reasonForPostFailure = "L'ajout dans la base de donnée a échoué.";
                }
                    }
                    else {
                        $successfullyAddedTopic = false;
                        $reasonForPostFailure = "Vous n'êtes pas identifié.";
                    }
            }
        
        $topicList = getTopicList($DB, CURRENT_CATEGORY);
        //Calculating which page we're on and how many there are
        define("NUMBER_OF_PAGES", getPage($topicList->rowCount(), TOPICS_PER_PAGE));
        if (!isset($firstTopic) OR $firstTopic > $topicList->rowCount()) {
            $firstTopic = 0;
            define("CURRENT_PAGE", 1);
        }
        else {
            define("CURRENT_PAGE", getPage($firstTopic, TOPICS_PER_PAGE));
        }
        $topicTable = $topicList->fetchAll();
        include(__ROOT__."/view/forum/showcategory_view.php");
    }
    else {
        $error = "La catégorie demandée n'existe pas.";
        include(__ROOT__."/view/forum/error.php");
    }
}
else {
    $error = "Pas de catégorie précisée.";
    include(__ROOT__."/view/forum/error.php");
}

?>