<?php
require_once("../../modele/isLoggedIn stub.php");
require_once("../../modele/pdoDatabaseRef.php");
require_once("../../modele/forum/newtopic_model.php");

if (isLoggedIn()) {
	if (CATEGORY_IS_SET) {
		if (CATEGORY_EXISTS) {
			include("../../view/forum/newtopic_view.php");
		}
		else {
			$error = "La catégorie précisée n'existe pas.";
                        include("../../view/forum/error.php");
		}
	}
	else {
		$error = "Pas de catégorie précisée.";
                include("../../view/forum/error.php");
	}
}
else {
	$error = "Vous devez être connecté pour créer un nouveau sujet.";
        include("../../view/forum/error.php");
}

?>