<?php

define("CATEGORY_IS_SET", (isset($_GET['c']) AND ((int)$_GET['c'] != 0)));
if (CATEGORY_IS_SET) {
	define("CURRENT_CATEGORY", (int)$_GET['c']);
	$categoryInfoQuery = $DB->query("
			SELECT 	*
			FROM category
			WHERE id = {$_GET['c']}
	");
	define("CATEGORY_EXISTS", ($categoryInfoQuery->rowCount() != 0));
	$categoryInfoQuery->closeCursor();
}

?>