
        
<?php
if(isset($end) AND isset($end)==0)

$DB = new PDO('mysql:host=localhost;dbname=home_switch_home', 'root', '');

$pseudo = $_POST["pseudo"];
$pass = hash('SHA512',$_POST["pass"]);
$mail = $_POST["mail"];

$req = $DB->prepare('INSERT INTO user(login,password,mail) VALUES(:pseudo,:pass,:mail)');
$req->execute(array(
    'pseudo' => $pseudo,
    'pass' => $pass,
    'mail' => $mail,
   ));

?>
 
//send confirmation email
<?php

if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // filtering bugged servers
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}
//Declaring html version of the text
$msgTxt = "Votre inscription a bien été prise en compte.";
$msgHtml = "<html><head></head><body><b>Bonjour</b>,votre compte HSH a bien été créé!</body></html>";
//==========
 
 
//boundary.
$boundary = "-----=".md5(rand());
$boundary_alt = "-----=".md5(rand());
//==========
 
//Define subject
$subject = "Votre compte Home Switch Home";
//=========
 
//Create Header
$header = "From: \"clemk91\"<clemk91@gmail.com>".$passage_ligne;
$header.= "Reply-to: \"WeaponsB\" <$mail>".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//
 
//Create message
$message = $passage_ligne."--".$boundary.$passage_ligne;
$message.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary_alt\"".$passage_ligne;
$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
//add text version
$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$msgTxt.$passage_ligne;
//==========
 
$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
 
//add html version
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$msgHtml.$passage_ligne;
//==========
 
//end boundary alternative
$message.= $passage_ligne."--".$boundary_alt."--".$passage_ligne;
//==========
 
 
 
$message.= $passage_ligne."--".$boundary.$passage_ligne;
 

//send
mail($mail,$subject,$message,$header);
 
//==========
?>
