<?php

try
{
	$DB = new PDO('mysql:host=localhost;dbname=home_switch_home', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (exception $e)
{
	die('Erreur'.$e->getMessage());
}

?>