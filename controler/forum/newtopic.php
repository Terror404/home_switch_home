<?php

define("__ROOT__", dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__."/modele/forum/core.php");
require_once(__ROOT__."/modele/pdoDatabaseRef.php");
require_once(__ROOT__."/modele/forum/newtopic_model.php");

if (isLoggedIn()) {
    if (CATEGORY_IS_SET) {
        if (CATEGORY_EXISTS) {
            include(__ROOT__."/view/forum/newtopic_view.php");
        }
        else {
            $error = "La catégorie précisée n'existe pas.";
            include(__ROOT__."/view/forum/error.php");
        }
    }
    else {
        $error = "Pas de catégorie précisée.";
        include(__ROOT__."/view/forum/error.php");
    }
}
else {
    $error = "Vous devez être connecté pour créer un nouveau sujet.";
    include(__ROOT__."/view/forum/error.php");
}

?>