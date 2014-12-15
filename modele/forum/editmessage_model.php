<?php

define("CURRENT_TOPIC", (int)$_GET['t']);
define("CURRENT_MESSAGE", (int)$_GET['p']);
define("POST_IS_SET", (isset($_GET['p']) AND ((int)$_GET['p'] != 0)));

if (POST_IS_SET) {
	$postQuery = $DB->query("
		SELECT	post.text AS content,
				user.id AS authorId
		FROM 	post, user
		WHERE	user.id = post.id_user
				AND post.id = {$_GET['p']}
	");
	define("POST_EXISTS", ($postQuery->rowCount() != 0));
}

?>