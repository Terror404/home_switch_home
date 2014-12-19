<?php

function isLoggedIn() {
    return (isset($_SESSION['userId']) and (int)$_SESSION['userId'] == 0);
}

//The first item is item n°0
function getPage($itemNumber, $itemsPerPage) {
    $page = ($itemNumber / $itemsPerPage);
    $page++;
    $page = floor($page);
    return $page;
}

//STUB
function userHasModeratorRights($userId) {
    return false;
}