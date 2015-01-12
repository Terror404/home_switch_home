<?php

function getTopicInfo($database, $whichTopic) {
    $topicInfoQuery = $database->prepare("
        SELECT  title   AS title,
                locked  AS lockStatus
        FROM    topic
        WHERE   id = :whichTopic
    ");
    $topicInfoQuery->execute(array(
        'whichTopic' => $whichTopic
    ));
    return $topicInfoQuery->fetch();
}

function getMessageList($database, $fromTopic) {
    $messageList = $database->prepare("
        SELECT	post.date_creation  AS creationTime,
                post.text           AS content,
                post.id             AS id,
                user.login          AS authorName,
                user.id             AS authorId,
                user.date_creation  AS joinTime
        FROM	post, user
        WHERE	post.id_topic = :fromTopic
                AND post.id_user = user.id
        ORDER BY creationTime ASC
    ");
    $messageList->execute(array(
        'fromTopic' => $fromTopic
    ));
    return $messageList;
}

define("MESSAGES_PER_PAGE", 15);

define("TOPIC_IS_SET", (isset($_GET['t']) AND ((int)$_GET['t'] != 0)));
if (TOPIC_IS_SET) {
    define("CURRENT_TOPIC", (int)$_GET['t']);
}
if (isset($_GET['p'])) {
    define("REQUESTED_POST", (int)$_GET['p']);
}
else {
    define("REQUESTED_POST", 0);
}

if (TOPIC_IS_SET) {
    $messageList = getMessageList($DB, CURRENT_TOPIC);
    //Calculating which page we're on and how many there are
    define("NUMBER_OF_PAGES", getPage($messageList->rowCount(), MESSAGES_PER_PAGE));
    if (REQUESTED_POST < 0 OR REQUESTED_POST > $messageList->rowCount()) {
        $firstMessage = 0;
        define("CURRENT_PAGE", 1);
    }
    else {
        define("CURRENT_PAGE", getPage(REQUESTED_POST, MESSAGES_PER_PAGE));
        $firstMessage = ((CURRENT_PAGE-1) * MESSAGES_PER_PAGE);
        //The first message displayed is the first on the page. There is a
        //known glitch if you delete the first message of a page with it
        //being the last of a topic; the result will be void of messages.
    }

    if (isLoggedIn()) {
        $hasModRights = userHasModeratorRights($_SESSION['userId'], $DB);
    }
    else {
        $hasModRights = false;
    }

    $topicInfo = getTopicInfo($DB, CURRENT_TOPIC);
}