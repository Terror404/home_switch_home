<?php

define("CURRENT_TOPIC", (int)$_GET['t']);
define("TOPIC_IS_SET", (isset($_GET['t']) AND ((int)$_GET['t'] != 0)));

if (TOPIC_IS_SET) {
	$messageList = $DB->query("
		SELECT *
		FROM post
		WHERE id_topic =" . CURRENT_TOPIC
	);
	define("TOPIC_EXISTS", ($messageList->rowCount() != 0));
}

?>