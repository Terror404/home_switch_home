
<?php

$pass = $_POST["pass"];
$repass = $_POST["repass"];

if ($pass != $repass ){
    include 'formulairehtml.php';
    echo '*Les mots de passe ne correspondent pas';
    exit();
}
?>
    

