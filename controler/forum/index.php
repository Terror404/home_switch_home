<?php

define("__ROOT__", dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__."/modele/pdoDatabaseRef.php");
require_once(__ROOT__."/modele/forum/index_model.php");

$categoryList = getFullCategoryList($DB);

if ($categoryList->rowCount() != 0) {
    include(__ROOT__."/view/forum/index_view.php");
}
else {
    $error = "Aucune catégorie trouvée.";
    include(__ROOT__."/view/forum/error.php");
}

?>