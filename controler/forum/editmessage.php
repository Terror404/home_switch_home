<?php
require_once("../../modele/isLoggedIn stub.php");
require_once("../../modele/pdoDatabaseRef.php");
require_once("../../modele/forum/editmessage_model.php");

if (isLoggedIn()) {
	if (POST_IS_SET) {
		if (POST_EXISTS) {
			$postData = $postQuery->fetch();
			$postQuery->closeCursor();
			if ($postData.authorId == $_SESSION['userId']) {
				include("../../view/forum/editmessage_view.php");
			}
			else {
				$error = "Vous n'avez pas l'autorisation de modifier ce
						message.";
				include("../../view/forum/error.php");
			}
		}
		else {
			$error = "Le message sélectionné n'existe pas.";
			include("../../view/forum/error.php");
		}
	}
	else {
		$error = "Pas de message précisé.";
		include("../../view/forum/error.php");
	}
}
else {
	$error = "Vous devez être connecté pour modifier un message.";
	include("../../view/forum/error.php");
}

?>