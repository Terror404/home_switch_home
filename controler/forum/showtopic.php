<?php

require_once("../../modele/isLoggedIn stub.php");
require_once("../../modele/pdoDatabaseRef.php");
require_once("../../modele/forum/showtopic_model.php");

if (TOPIC_IS_SET) {
	$messageList = getMessageList($DB, CURRENT_TOPIC);
	if ($messageList->rowCount() == 0) {
		$error = "Le sujet demandé n'existe pas.";
		$messageList->closeCursor();
		include("../../view/forum/error.php");
	}
	else {
		include("messagelistupdate.php");
		include("../../view/forum/showtopic_view.php");
	}
}
else {
	$error = "Pas de sujet précisé.";
	include("../../view/forum/error.php");
}

?>