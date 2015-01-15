<?php

if (!defined("__ROOT__")) {
    define("__ROOT__", dirname(dirname(dirname(__FILE__))));
}
require_once(__ROOT__."/modele/pdoDatabaseRef.php");
require_once(__ROOT__."/modele/forum/core.php");
require_once(__ROOT__."/modele/forum/index_model.php");

//Category modification
//These sections has less foolproofing/foulproofing than usual, as it should
//only be available to administrators.
if (isset($_POST['categoryModificationInstruction'])) {
    
    if (!CAN_MODIFY_CATEGORIES) {
        $successfullyModifiedCategories = false;
        $reasonForCategoryModificationFailure = "Vous n'avez pas l'autorisation "
                . "de modifier les catégories.";
    }
    elseif (!isset($_POST['categoryTitle']) OR !isset($_POST['categoryDescription'])) {
        $successfullyModifiedCategories = false;
        $reasonForCategoryModificationFailure = "Le titre ou la description de "
                . "la catégorie n'a pas été précisé.";
    }
    
    //Adding a new category
    elseif ($_POST['categoryModificationInstruction'] == 'add') {
        try {
            $tempQuery = $DB->query("
                SELECT MAX(position) AS lastPosition FROM category
            ");
            $tempResult = $tempQuery->fetch();
            $newCategoryPosition = $tempResult['lastPosition'] +1;
            $DB->query("
                INSERT INTO category (title, description, position)
                VALUES ('".$_POST['categoryTitle']."',".
                    "'".$_POST['categoryDescription']."',".
                    $newCategoryPosition.")
            ");
            $successfullyModifiedCategories = true;
            $reasonForCategoryModificationFailure = null;
        }
        catch (Exception $e) {
            $successfullyModifiedCategories = false;
            $reasonForCategoryModificationFailure = "Erreur lors de l'ajout "
                    . "dans la base de données : " . $e->getMessage();
        }
    }
    
    //Editing an existing category
    elseif ($_POST['categoryModificationInstruction'] == 'edit') {
        if (isset($_POST['categoryToEdit'])) {
            try {
                $DB->query("
                    UPDATE category
                    SET title = '".$_POST['categoryTitle']."',
                        description = '".$_POST['categoryDescription']."'
                    WHERE id = ".$_POST['categoryToEdit']
                );
                $successfullyModifiedCategories = true;
                $reasonForCategoryModificationFailure = null;
            } catch (Exception $e) {
                $successfullyModifiedCategories = false;
                $reasonForCategoryModificationFailure = "Erreur lors de l'ajout "
                        . "dans la base de données : " . $e->getMessage();
            }
        }
        else {
            $successfullyModifiedCategories = false;
            $reasonForCategoryModificationFailure = "Pas de catégorie précisée "
                    . "pour la modification.";
        }
    }
    
    else {
        $successfullyModifiedCategories = false;
        $reasonForCategoryModificationFailure = "Instruction non reconnue.";
    }
}

//Category deletion
if (isset($_POST['categoryDeleteInstruction'])) {
    if (!CAN_MODIFY_CATEGORIES) {
        $successfullyDeletedCategory = false;
        $reasonForCategoryDeletionFailure = "Vous n'avez pas l'autorisation de "
            . "modifier les catégories.";
    }
    else {
        try {
            //First delete all topics and all their messages
            $categoryDeleteQuery = $DB->query("
                SELECT id
                FROM topic
                WHERE id_category=".$_POST['categoryDeleteInstruction']
            );
            while ($topicToDelete = $categoryDeleteQuery->fetch()) {
                deleteTopic($topicToDelete['id'], $DB);
            }
            $categoryDeleteQuery->closeCursor();
            
            //Then actually delete the category
            $DB->query("
                DELETE FROM category
                WHERE id=".$_POST['categoryDeleteInstruction']
            );
            $successfullyDeletedCategory = true;
            $reasonForCategoryDeletionFailure = null;
        }
        catch (Exception $e) {
            $successfullyDeletedCategory = false;
            $reasonForCategoryDeletionFailure = "Erreur lors de la suppression "
                . "de la base de données : " . $e->getMessage();
        }
    }
}

//Category movement
if (isset($_POST['categoryMoveUp'])) {
    $categoryToBeMoved = $_POST['categoryMoveUp'];
    $positionComparison = "<";
    $positionAscOrDesc = "DESC";
}
elseif (isset($_POST['categoryMoveDown'])) {
    $categoryToBeMoved = $_POST['categoryMoveDown'];
    $positionComparison = ">";
    $positionAscOrDesc = "ASC";
}
if (isset($categoryToBeMoved)) {
    if (!CAN_MODIFY_CATEGORIES) {
        $successfullyMovedCategory = false;
        $reasonForCategoryMovementFailure = "Vous n'avez pas l'autorisation de "
                . "modifier les catégories.";
    }
    else {
        try {
            $moveInfoQuery = $DB->query("
                SELECT position
                FROM category
                WHERE id=".$categoryToBeMoved
            );
            $moveInfoLine = $moveInfoQuery->fetch();
            $categoryInitialPosition = $moveInfoLine['position'];
            
            $moveInfoQuery = $DB->query("
                SELECT id, position
                FROM category
                WHERE (position".$positionComparison.$categoryInitialPosition.")
                ORDER BY position ".$positionAscOrDesc."
                LIMIT 1
            ");
            if ($moveInfoQuery->rowCount() == 0) {
                throw new Exception("Impossible de déplacer cette catégorie "
                    . "dans cette direction.");
            }
            $moveInfoLine = $moveInfoQuery->fetch();
            $categoryExchangingPosition = $moveInfoLine['id'];
            $categoryDestination = $moveInfoLine['position'];
            
            $DB->query("
                UPDATE category
                SET position =".$categoryDestination."
                WHERE id =".$categoryToBeMoved."
            ");
            $DB->query("
                UPDATE category
                SET position =".$categoryInitialPosition."
                WHERE id =".$categoryExchangingPosition."
            ");
            $successfullyMovedCategory = true;
            $reasonForCategoryMovementFailure = null;
        }
        catch (Exception $e) {
            $successfullyMovedCategory = false;
            $reasonForCategoryMovementFailure = "Erreur lors de la modification"
                . " de la base de données : " . $e->getMessage();
        }
    }
}

$categoryList = getFullCategoryList($DB);
if ($categoryList->rowCount() == 0) {
    $DB->query("
        INSERT INTO category (title, description, position)
        VALUES ('Aide', 'Remarques sur le site et signalement de problèmes.', 1)
    ");
    $categoryList = getFullCategoryList($DB);
}
$_SESSION['forumCategoryModificationMode'] = MODIFYING_CATEGORIES;
include(__ROOT__."/view/forum/index_view.php");