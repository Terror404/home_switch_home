<?php

$to = $mail;
$subject = "Confirmation de votre session utilisateur sur Home Switch Home";     
$message = "Bonjour,<br />Veuillez confirmer que vous avez créé une session utilisateur sur le site Home Switch Home.<br />Bien à vous,<br />Home Switch Home."; 
        
mail($to, $subject, $message);
?>
