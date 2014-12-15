<?php

/* test content on line 18 */
require_once("isLoggedIn stub.php");
require_once("../modele/pdoDatabaseRef.php");
require_once("showtopic_model.php");

if (TOPIC_IS_SET) {
	$messageList = getMessageList($DB, CURRENT_TOPIC);
	if ($messageList->rowCount() == 0) {
		$error = "Le sujet demandé n'existe pas.";
		$messageList->closeCursor();
		include("error.php");
	}
	else {
		include("messagelistupdate.php");
		include("showtopic_view.php");
	}
}
else {
	$error = "Pas de sujet précisé.";
	include("error.php");
}

?>