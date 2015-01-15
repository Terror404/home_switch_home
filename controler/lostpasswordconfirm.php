<?php

if (!defined("__ROOT__")) {
    define("__ROOT__", dirname(dirname(__FILE__)));
}
require_once(__ROOT__."/modele/pdoDatabaseRef.php");
require_once(__ROOT__."/modele/forum/core.php"); //J'ai quelques fonctions que j'aime bien à l'intérieur
require_once(__ROOT__."/modele/lostpassword_model.php");

if (isLoggedIn()) {
    ?>
    Vous êtes déjà connecté, vous ne pouvez pas réinitialiser votre mot de passe.<br/>
    <a href="../controler/content.php">Retour à l'accueil</a>
    <?php
}
else {
    if (isset($_POST['email'])) {
        $userInfo = findUserWithEmail($_POST['email'], $DB);
    }
    else {
        $userInfo = null;
    }
    
    if ($userInfo != null) {
        /*$newPassword =*/resetPasswordForUser($userInfo['id'], $DB);
        //sendPasswordRecoveryMessage($userInfo, $newPassword);
        include(__ROOT__."/view/lostpasswordconfirm.php");
    }
    else {
        ?>
        Aucun utilisateur n'a été trouvé pour cette adresse email.
        <a href="../controler/content.php">Retour à l'accueil</a>
        <?php
    }
}