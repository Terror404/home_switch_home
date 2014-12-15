<?php
require_once("isLoggedIn stub.php");
require_once("../modele/pdoDatabaseRef.php");
require_once("editmessage_model.php");

if (isLoggedIn()) {
	if (POST_IS_SET) {
		if (POST_EXISTS) {
			$postData = $postQuery->fetch();
			$postQuery->closeCursor();
			if ($postData.authorId == $_SESSION['userId']) {
				include("editmessage_view.php");
			}
			else {
				$error = "Vous n'avez pas l'autorisation de modifier ce
						message.";
				include("error.php");
			}
		}
		else {
			$error = "Le message sélectionné n'existe pas.";
			include("error.php");
		}
	}
	else {
		$error = "Pas de message précisé.";
		include("error.php");
	}
}
else {
	$error = "Vous devez être connecté pour modifier un message.";
	include("error.php");
}

?>