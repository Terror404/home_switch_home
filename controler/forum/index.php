<?php

if (!defined("__ROOT__")) {
    define("__ROOT__", dirname(dirname(dirname(__FILE__))));
}
require_once(__ROOT__."/modele/pdoDatabaseRef.php");
require_once(__ROOT__."/modele/forum/core.php");
require_once(__ROOT__."/modele/forum/index_model.php");

//Category modification
//This section has less foolproofing/foulproofing than usual, as it should only
//be available to administrators.
if (isset($_POST['categoryModificationInstruction'])) {
    
    if (!CAN_MODIFY_CATEGORIES) {
        $successfullyModifiedCategories = false;
        $reasonForCategoryModificationFailure = "Vous n'avez pas l'autorisation
            de modifier les catégories.";
    }
    elseif (!isset($_POST['categoryTitle']) OR !isset($_POST['categoryDescription'])) {
        $successfullyModifiedCategories = false;
        $reasonForCategoryModificationFailure = "Le titre ou la description
            de la catégorie n'a pas été précisé.";
    }
    
    //Adding category
    elseif ($_POST['categoryModificationInstruction'] == 'add') {
        try {
            $DB->query("
                INSERT INTO category (title, description)
                VALUES ('".$_POST['categoryTitle']."','".$_POST['categoryDescription']."')
            ");
            $successfullyModifiedCategories = true;
            $reasonForCategoryModificationFailure = null;
        }
        catch (Exception $e) {
            $successfullyModifiedCategories = false;
            $reasonForCategoryModificationFailure = "Erreur lors de l'ajout dans
                la base de données : " . $e->getMessage();
        }
    }
    
    //Editing an existing category
    elseif ($_POST['categoryModificationInstruction'] == 'edit') {
        if (isset($_POST['categoryToEdit'])) {
            try {
                $DB->query("
                    UPDATE category
                    SET title = '".$_POST['categoryTitle']."'
                        description = '".$_POST['categoryDescription']."'
                    WHERE id = ".$_POST['categoryToEdit']
                );
                $successfullyModifiedCategories = true;
                $reasonForCategoryModificationFailure = null;
            } catch (Exception $e) {
                $successfullyModifiedCategories = false;
                $reasonForCategoryModificationFailure = "Erreur lors de l'ajout
                    dans la base de données : " . $e->getMessage();
            }
        }
        else {
            $successfullyModifiedCategories = false;
            $reasonForCategoryModificationFailure = "Instruction non reconnue.";
        }
    }
    
    else {
        $successfullyModifiedCategories = false;
        $reasonForCategoryModificationFailure = "Instruction non reconnue.";
    }
}

$categoryList = getFullCategoryList($DB);
if ($categoryList->rowCount() != 0) {
    $_SESSION['forumCategoryModificationMode'] = MODIFYING_CATEGORIES;
    include(__ROOT__."/view/forum/index_view.php");
}
else {
    $error = "Aucune catégorie trouvée.";
    include(__ROOT__."/view/forum/error.php");
}