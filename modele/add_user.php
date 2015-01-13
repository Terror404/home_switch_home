
        
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
    
