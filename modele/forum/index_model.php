<?php

function getFullCategoryList($database) {
    return $database->query("
        SELECT  title       AS title,
                description AS description,
                id          AS id
        FROM    category
    ");
}

define("CAN_MODIFY_CATEGORIES", isLoggedIn() AND userHasAdminRights($_SESSION['userId'], $DB));

define("MODIFYING_CATEGORIES",
    CAN_MODIFY_CATEGORIES
    AND (
        (
            isset($_SESSION['forumCategoryModificationMode'])
            AND $_SESSION['forumCategoryModificationMode']
            AND !(
                isset($_POST['forumCategoryModificationMode'])
                AND !$_POST['forumCategoryModificationMode']
            )
        )
        OR (
            isset($_POST['forumCategoryModificationMode'])
            AND $_POST['forumCategoryModificationMode']
        )
    )
    /* Either we're already modifying categories and we check there wasn't an
     * instruction to deactivate modification mode, or we're not and we check
     * that there was an instruction to activate it. */
);