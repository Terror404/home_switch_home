<?php

require_once("../../modele/pdoDatabaseRef.php");
require_once("../../modele/forum/index_model.php");

$categoryList = getFullCategoryList($DB);

if ($categoryList != null)
{
	include("../../view/forum/index_view.php");
}
else
{
	$error = "Aucune catégorie trouvée.";
	include("../../view/forum/error.php");
}

?>