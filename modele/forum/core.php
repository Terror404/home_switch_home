<?php

function isLoggedIn() {
    return (isset($_SESSION['userId']) and (int)$_SESSION['userId'] != 0);
}

//The first item is item n°0
function getPage($itemNumber, $itemsPerPage) {
    $page = ($itemNumber / $itemsPerPage);
    $page++;
    $page = floor($page);
    return $page;
}

function userHasModeratorRights($userId, $database) {
    $userInfoQuery = $database->query("
            SELECT  access
            FROM    user
            WHERE   id =" . $userId
    );
    $userInfo = $userInfoQuery->fetch();
    return ($userInfo['access'] >= 1);
}

function userHasAdminRights($userId, $database) {
    $userInfoQuery = $database->query("
            SELECT  access
            FROM    user
            WHERE   id =" . $userId
    );
    $userInfo = $userInfoQuery->fetch();
    return ($userInfo['access'] >= 2);
}

function displayConfirmation($success, $successMessage, $operation, $reasonForFailure) {
    if ($success) {
        echo "<p>";
        echo $successMessage;
        echo "</p><br/>";
    }
    else {
        echo "<p>Une erreur s'est produite lors de ";
        echo $operation;
        echo " :<br/>";
        echo $reasonForFailure;
        echo "</p><br/>";
    }
}