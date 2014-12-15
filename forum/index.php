<?php

require_once("../modele/pdoDatabaseRef.php");
require_once("index_model.php");

$categoryList = getFullCategoryList($DB);

if ($categoryList != null)
{
	include("index_view.php");
}
else
{
	$error = "Aucune catégorie trouvée.";
	include("error.php");
}

?>