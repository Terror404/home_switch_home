<?php

if (isset($_POST['lockingTopic']) and $_POST['lockingTopic'] == "true") {
    if (!isLoggedIn()) {
        $successfullyLockedTopic = false;
        $reasonForLockFailure = "Vous n'êtes pas identifié.";
    }
    elseif ($topicInfo['lockStatus']) {
        $successfullyLockedTopic = false;
        $reasonForLockFailure = "Le sujet est déjà verrouillé.";
    }
    elseif (!$hasModRights) {
        $successfullyLockedTopic = false;
        $reasonForLockFailure = "Vous n'avez pas les droits nécessaires pour verrouiller ce sujet.";
    }
    else {
        try {
            $DB->query("
                SELECT topic
                SET locked = true
                WHERE id = " . CURRENT_TOPIC
            );
            $topicInfo['lockStatus'] = true;
            $successfullyLockedTopic = true;
        }
        catch (Exception $e) {
            $successfullyLockedTopic = false;
            $reasonForLockFailure = "Echec de la modification de la base de données.";
        }
    }
}

if (isset($_POST['unlockingTopic']) and $_POST['unlockingTopic'] == "true") {
    if (!isLoggedIn()) {
        $successfullyUnlockedTopic = false;
        $reasonForUnlockFailure = "Vous n'êtes pas identifié.";
    }
    elseif ($topicInfo['lockStatus']) {
        $successfullyUnlockedTopic = false;
        $reasonForUnlockFailure = "Le sujet n'est pas verrouillé.";
    }
    elseif (!$hasModRights) {
        $successfullyUnlockedTopic = false;
        $reasonForUnlockFailure = "Vous n'avez pas les droits nécessaires pour déverrouiller ce sujet.";
    }
    else {
        try {
            $DB->query("
                SELECT topic
                SET locked = false
                WHERE id = " . CURRENT_TOPIC
            );
            $topicInfo['lockStatus'] = false;
            $successfullyUnlockedTopic = true;
        }
        catch (Exception $e) {
            $successfullyUnlockedTopic = false;
            $reasonForUnlockFailure = "Echec de la modification de la base de données.";
        }
    }
}