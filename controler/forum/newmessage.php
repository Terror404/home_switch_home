<?php

if (!defined("__ROOT__")) {
    define("__ROOT__", dirname(dirname(dirname(__FILE__))));
}
require_once(__ROOT__."/modele/forum/core.php");
require_once(__ROOT__."/modele/pdoDatabaseRef.php");
require_once(__ROOT__."/modele/forum/newmessage_model.php");

if (isLoggedIn()) {
    if (TOPIC_IS_SET) {
        if (TOPIC_EXISTS) {
            include(__ROOT__."/view/forum/newmessage_view.php");
        }
        else {
            $error = "Le sujet précisé n'existe pas.";
            include(__ROOT__."/view/forum/error.php");
        }
    }
    else {
        $error = "Pas de sujet précisé.";
        include(__ROOT__."/view/forum/error.php");
    }
}
else {
    $error = "Vous devez être connecté pour ajouter une réponse.";
    include(__ROOT__."/view/forum/error.php");
}

?>