<?php

if (!defined("__ROOT__")) {
    define("__ROOT__", dirname(dirname(__FILE__)));
}
require_once(__ROOT__."/modele/forum/core.php"); //J'ai quelques fonctions que j'aime bien à l'intérieur

if (!isLoggedIn()) {
    include(__ROOT__."/view/lostpasswordform.php");
}
else {
    ?>
    Vous êtes déjà connecté, vous ne pouvez pas réinitialiser votre mot de passe.<br/>
    <a href="../controler/content.php">Retour à l'accueil</a>
    <?php
}