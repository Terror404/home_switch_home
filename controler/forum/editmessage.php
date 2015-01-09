<?php

define("__ROOT__", dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__."/modele/forum/core.php");
require_once(__ROOT__."/modele/pdoDatabaseRef.php");
require_once(__ROOT__."/modele/forum/editmessage_model.php");

if (!isLoggedIn()) {
    $error = "Vous devez être connecté pour modifier un message.";
    include(__ROOT__."/view/forum/error.php");
}
elseif (!POST_IS_SET) {
    $error = "Pas de message précisé.";
    include(__ROOT__."/view/forum/error.php");
}
 elseif (!POST_EXISTS) {
    $error = "Le message demandé n'existe pas.";
    include(__ROOT__."/view/forum/error.php");
 }
 elseif (!POST_AND_TOPIC_MATCH) {
    $error = "Le sujet précisé ne contient pas ce message.";
    include(__ROOT__."/view/forum/error.php");
 }
 elseif (
    $postData['authorId'] != $_SESSION['userId']
    and !userHasModeratorRights($_SESSION['userId'], $DB)
) {
    $error = "Vous n'avez pas l'autorisation de modifier ce message.";
    include(__ROOT__."/view/forum/error.php");
}
else {
    include(__ROOT__."/view/forum/editmessage_view.php");
}