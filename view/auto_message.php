<?php

$mail=$_POST['mail'];
$login=$_POST['pseudo'];
        
$destinataire=$mail;
$sujet="Activer votre compte";
$entete="From : Home Switch Home";
$message="Bonjour $login . Bienvenue sur Home Switch Home. Veuillez confirmer l'activation de votre compte.";

mail($destinataire,$sujet,$message,$entete);

?>

