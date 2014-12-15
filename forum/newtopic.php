<?php
require_once("isLoggedIn stub.php");
require_once("../modele/pdoDatabaseRef.php");
require_once("newtopic_model.php");

if (isLoggedIn()) {
	if (CATEGORY_IS_SET) {
		if (CATEGORY_EXISTS) {
			include("newtopic_view.php");
		}
		else {
			$error = "La catégorie précisée n'existe pas.";
			include("error.php");
		}
	}
	else {
		$error = "Pas de catégorie précisée.";
		include("error.php");
	}
}
else {
	$error = "Vous devez être connecté pour créer un nouveau sujet.";
	include("error.php");
}

?>