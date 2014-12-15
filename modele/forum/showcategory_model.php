<?php

function getTopicList($database, $fromCategory) {
	return $database->query("
		SELECT	topic.id AS id,
				topic.title AS title,
				topic.date_creation AS creationTime,
				user.login AS authorName
		FROM 	topic, user
		WHERE 	topic.id_category = $fromCategory
				AND topic.id_user = user.id
	");
}

define("CATEGORY_IS_SET", (isset($_GET['c']) AND ((int)$_GET['c'] != 0)));
if (CATEGORY_IS_SET) {
	define("CURRENT_CATEGORY", $_GET['c']);
	$categoryInfoQuery = $DB->query("
			SELECT title AS title
			FROM category
			WHERE id = {$_GET['c']}
		");
	define("CATEGORY_EXISTS", ($categoryInfoQuery->rowCount() != 0));
	if (CATEGORY_EXISTS) {
		$categoryInfo = $categoryInfoQuery->fetch();
	}
	$categoryInfoQuery->closeCursor();
}

define("ADDING_NEW_TOPIC", (isset($_POST['openingPost']))
    AND ($_POST['openingPost'] != "")
    AND ($_POST['openingPost'] != null)
    AND (isset($_POST['topicTitle']))
    AND ($_POST['topicTitle'] != "")
    AND ($_POST['topicTitle'] != null)
)

?>