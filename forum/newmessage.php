<?php
require_once("isLoggedIn stub.php");
require_once("../modele/pdoDatabaseRef.php");
require_once("newmessage_model.php");

if (isLoggedIn()) {
	if (TOPIC_IS_SET) {
		if (TOPIC_EXISTS) {
			include("newmessage_view.php");
		}
		else {
			$error = "Le sujet précisé n'existe pas.";
			include("error.php");
		}
	}
	else {
		$error = "Pas de sujet précisé.";
		include("error.php");
	}
}
else {
	$error = "Vous devez être connecté pour ajouter une réponse.";
	include("error.php");
}

?>