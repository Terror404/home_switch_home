<?php

try
{
	$DB = new PDO('mysql:host=localhost;dbname=home_switch_home', 'HsH', 'appG1A1AWebdesign', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $DB->query('set names utf8');
}
catch (exception $e)
{
	die('Erreur'.$e->getMessage());
}

?>