<?php

define("TOPIC_IS_SET", (isset($_GET['t'])) AND ((int)$_GET['t'] != 0));
if (TOPIC_IS_SET) {
    define("CURRENT_TOPIC", (int)$_GET['t']);
}

define("POST_IS_SET", (isset($_GET['p']) AND ((int)$_GET['p'] != 0)));
if (POST_IS_SET) {
    define("CURRENT_MESSAGE", (int)$_GET['p']);
    
    //checking that the post actually exists; data gathered here will be used
    //for additional checks and in the view
    $postQuery = $DB->query("
        SELECT  post.text   AS content,
                user.id     AS authorId
        FROM    post, user
        WHERE   user.id = post.id_user
                AND post.id =" . CURRENT_MESSAGE
    );
    define("POST_EXISTS", ($postQuery->rowCount() != 0));
    if (POST_EXISTS) {
        $postData = $postQuery->fetch();
        $postQuery->closeCursor();
        
        //doing a check to see if the message is actually in the topic
        $matchCheckQuery = $DB->query("
            SELECT post.id AS id
            FROM post
            WHERE post.id_topic =" . CURRENT_TOPIC .
                " AND post.id =" . CURRENT_MESSAGE
        );
        define("POST_AND_TOPIC_MATCH", ($matchCheckQuery->rowCount() > 0));
        
        if (POST_AND_TOPIC_MATCH) {
            //checking whether the topic can be deleted (only if the message
            //being edited is the only one in the topic or the user is a mod)
            if (userHasModeratorRights($_SESSION['userId'], $DB)) {
                define("TOPIC_CAN_BE_DELETED", true);
            }
            else {
                $deleteCheckQuery = $DB->query("
                    SELECT post.id AS id
                    FROM post
                    WHERE post.id_topic =" . CURRENT_TOPIC . "
                    LIMIT 2
                ");
                define("TOPIC_CAN_BE_DELETED", ($deleteCheckQuery->rowCount()==1));
            }
            
            //checking whether the post can be deleted (only if it is the last
            //post or the user is a mod)
            if (TOPIC_CAN_BE_DELETED or userHasModeratorRights($_SESSION['userId'], $DB)) {
                define("POST_CAN_BE_DELETED", true);
            }
            else {
                $lastPost = getLastMessageFromTopic(CURRENT_TOPIC, $DB);
                define("POST_CAN_BE_DELETED", $lastPost['id'] == CURRENT_MESSAGE);
            }
        }
    }
}