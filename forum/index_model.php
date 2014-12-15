<?php

function getFullCategoryList($database)
{
	return $database->query("
		SELECT	title AS title,
				description AS description,
				id AS id
		FROM category
	");
}