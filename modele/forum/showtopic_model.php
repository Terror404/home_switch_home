<?php

define("MESSAGES_PER_PAGE", 15);

define("TOPIC_IS_SET", (isset($_GET['t']) AND ((int)$_GET['t'] != 0)));
if (TOPIC_IS_SET) {
    define("CURRENT_TOPIC", (int)$_GET['t']);
}
if (isset($_GET['p'])) {
    $firstMessage = (int)$_GET['p'];
}

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