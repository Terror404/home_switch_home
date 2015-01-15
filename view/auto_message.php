<?php

$mail=$_POST['mail'];
$login=$_POST['pseudo'];
        
$destinataire=$mail;
$sujet="Activer votre compte";
$entete="From : Home Switch Home";
$message="Bonjour $login . Bienvenue sur Home Switch Home. Vous pouvez maintenant échanger votre maison pour les vacances en quelques cliques.";

mail($destinataire,$sujet,$message,$entete);

?>

