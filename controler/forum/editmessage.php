<?php

define("__ROOT__", dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__."/modele/forum/core.php");
require_once(__ROOT__."/modele/pdoDatabaseRef.php");
require_once(__ROOT__."/modele/forum/editmessage_model.php");

if (isLoggedIn()) {
    if (POST_IS_SET) {
        if (POST_EXISTS) {
            $postData = $postQuery->fetch();
            $postQuery->closeCursor();
            if ($postData['authorId'] == $_SESSION['userId']) {
                include(__ROOT__."/view/forum/editmessage_view.php");
            }
            else {
                $error = "Vous n'avez pas l'autorisation de modifier ce
                    message.";
                include(__ROOT__."/view/forum/error.php");
            }
        }
        else {
            $error = "Le message sélectionné n'existe pas.";
            include(__ROOT__."/view/forum/error.php");
        }
    }
    else {
        $error = "Pas de message précisé.";
        include(__ROOT__."/view/forum/error.php");
    }
}
else {
    $error = "Vous devez être connecté pour modifier un message.";
    include(__ROOT__."/view/forum/error.php");
}

?>