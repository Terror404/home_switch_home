<?php

define("__ROOT__", dirname(dirname(__FILE__)));
require_once(__ROOT__."/modele/pdoDatabaseRef.php");

$userInfoQuery = $DB->prepare("
    SELECT
        user.password AS password,
        user.id AS id,
        user.picture AS picture,
        user.access AS access
    FROM
        user
    WHERE
        login = :login
");
$userInfoQuery->execute(array('login'=>$_POST['login']));