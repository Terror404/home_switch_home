
        
<?php

$DB = new PDO('mysql:host=localhost;dbname=home_switch_home', 'root', '');

$pseudo = $_POST["pseudo"];
$pass = $_POST["pass"];
$mail = $_POST["mail"];

$req = $DB->prepare('INSERT INTO user(login,password,mail) VALUES(:pseudo,:pass,:mail)');
$req->execute(array(
    'pseudo' => $pseudo,
    'pass' => $pass,
    'mail' => $mail,
   ));

?>
    
