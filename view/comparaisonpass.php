
<?php

$pass = $_POST["pass"];
$repass = $_POST["repass"];

if ($pass != $repass ){
    include 'form_user.php';
    echo '*Les mots de passe ne correspondent pas';
    exit();
}
?>
    

