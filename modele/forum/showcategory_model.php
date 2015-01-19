<?php

define("TOPICS_PER_PAGE", 20);

function getTopicList($database, $fromCategory) {
    $topicList = $database->prepare("
        SELECT  topic.id            AS id,
                topic.title         AS title,
                topic.date_creation AS creationTime,
                user.login          AS authorName
        FROM    topic, user
        WHERE   topic.id_category = ?
                AND topic.id_user = user.id
    ");
    $topicList->execute(array($fromCategory));
    return $topicList;
}

if (isset($_GET['t'])) {
    $firstTopic = (int)$_GET['t'];
}

define("CATEGORY_IS_SET", (isset($_GET['c']) AND ((int)$_GET['c'] != 0)));
if (CATEGORY_IS_SET) {
    define("CURRENT_CATEGORY", (int)$_GET['c']);
    $currCategory = CURRENT_CATEGORY;
    //setting it to a var so I can use it inside the query
    $categoryInfoQuery = $DB->query("
        SELECT title AS title
        FROM category
        WHERE id = $currCategory
    ");
    define("CATEGORY_EXISTS", ($categoryInfoQuery->rowCount() != 0));
    if (CATEGORY_EXISTS) {
        $categoryInfo = $categoryInfoQuery->fetch();
    }
    $categoryInfoQuery->closeCursor();
}

define("ADDING_NEW_TOPIC",
    (isset($_POST['openingPost']))
    AND ($_POST['openingPost'] != "")
    AND ($_POST['openingPost'] != null)
    AND (isset($_POST['topicTitle']))
    AND ($_POST['topicTitle'] != "")
    AND ($_POST['topicTitle'] != null)
);