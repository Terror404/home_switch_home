<?php
    try 
        {
            $bdd = new PDO ("mysql:host=localhost;dbname=home_switch_home","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } 
    catch (Exception $ex) 
        {
            die ('Erreur:'.$ex ->getMessage());
        }
?>
<?php
    $askPass=$bdd->prepare("SELECT password FROM user WHERE login=:login");
        $askPass->execute(array('login'=>$_POST['login']));
?>
<?php
    $askId=$bdd->prepare('SELECT id FROM user WHERE login=:login');
        $askId->execute(array('login'=>$_POST['login']));
?>
<?php
    $askPic=$bdd->prepare('SELECT picture FROM user WHERE login=:login');
        $askPic->execute(array('login'=>$_POST['login']))
?>