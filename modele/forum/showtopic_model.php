<?php

define("TOPIC_IS_SET", (isset($_GET['t']) AND ((int)$_GET['t'] != 0)));
if (TOPIC_IS_SET) {
    define("CURRENT_TOPIC", (int)$_GET['t']);
}

function getMessageList($database, $fromTopic)
{
	return $database->query("
		SELECT	post.date_creation as creationTime,
				post.text as content,
				user.login as authorName
		FROM	post, user
		WHERE	post.id_topic = $fromTopic
				AND post.id_user = user.id
		ORDER BY creationTime ASC
	");
}

?>