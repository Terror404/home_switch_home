<?php

function findUserWithEmail($emailAddress, $database) {
    $finderQuery = $database->prepare("
        SELECT id
        FROM user
        WHERE mail = ?
    ");
    $finderQuery->execute(array($emailAddress));
    return $finderQuery->fetch();
}

function resetPasswordForUser($whichUser, $database) {
    $newPassword = base64_encode(pack('N2', mt_rand(), mt_rand()));
    //Génère un code aléatoire de 12 caractères
    $DB->query("
        UPDATE user
        SET password='".$newPassword."'
        WHERE id =".$whichUser
    );
    return $newPassword;
}