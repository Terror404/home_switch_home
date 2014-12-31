<?php
    try 
        {
            $DB = new PDO ("mysql:host=localhost;dbname=home_switch_home","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } 
    catch (Exception $ex) 
        {
            die ('Erreur:'.$ex ->getMessage());
        }
?>
<?php
    $askPass=$DB->prepare('SELECT password FROM user WHERE login=:login');
        $askPass->execute(array('login'=>$_POST['login']));
        
    $askLogin=$DB->prepare('SELECT login FROM user WHERE login=:login');
        $askPass->execute(array('login'=>$_POST['login']));
?>