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
    $askLogin=$DB->prepare('SELECT COUNT(*) FROM `user` WHERE login=:login');
        $askLogin->execute(array('login'=>$_GET['login']));
?>
<?php
while ($resLogin=$askLogin->fetch())
{
echo $askLogin;
}