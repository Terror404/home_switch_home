<?php

if (!defined("__ROOT__")) {
    define("__ROOT__", dirname(dirname(dirname(__FILE__))));
}
require_once(__ROOT__."/modele/pdoDatabaseRef.php");
require_once(__ROOT__."/modele/forum/core.php");
require_once(__ROOT__."/modele/forum/editcategory_model.php");

if (INSTRUCTION_OK) {
    if (INSTRUCTION == 'edit' AND !CATEGORY_EXISTS) {
        $error = "La catégorie demandée n'existe pas.";
        include(__ROOT__."/view/forum/error.php");
    }
    else {
        include(__ROOT__."/view/forum/editcategory_view.php");
    }
}
else {
    $error = "Instruction incorrecte.";
    include(__ROOT__."/view/forum/error.php");
}