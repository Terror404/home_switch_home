<?php

define("__ROOT__", dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__."/modele/isLoggedIn stub.php");
require_once(__ROOT__."/modele/pdoDatabaseRef.php");
require_once(__ROOT__."/modele/forum/showtopic_model.php");

if (TOPIC_IS_SET) {
	$messageList = getMessageList($DB, CURRENT_TOPIC);
	if ($messageList->rowCount() == 0) {
		$error = "Le sujet demandé n'existe pas.";
		$messageList->closeCursor();
		include(__ROOT__."/view/forum/error.php");
	}
	else {
		include("messagelistupdate.php");
		include(__ROOT__."/view/forum/showtopic_view.php");
	}
}
else {
	$error = "Pas de sujet précisé.";
	include(__ROOT__."/view/forum/error.php");
}

?>