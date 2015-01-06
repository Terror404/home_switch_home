<?php
//Get all the houses belonging to the current user
$askHouse=$DB->prepare('SELECT * FROM house WHERE id_user=:iduser');
    $askHouse->execute(array('iduser'=>$_SESSION['userId']));
?>
<?php
if(isset($_POST['idHouseU1']))
{
    //Get the information on the chosen house 
    $askHChosenU1=$DB->prepare('SELECT * FROM house WHERE id=:idhouse');
        $askHChosenU1->execute(array('idhouse'=>$_POST['idHouseU1']));
}
?>
<?php
if(isset($_POST['idHouseU1']))
{
    //Get all the ad linked to the house
    $askAdU1=$DB->prepare('SELECT * FROM ad WHERE id_house=:idhouse');
    $askAdU1->execute(array('idhouse'=>$_POST['idHouseU1']));
}
?>
<?php
if(isset($_POST['idAdU1']))
{
    //Get the information on the chosen ad
    $askAChosenU1=$DB->prepare('SELECT * FROM ad WHERE id=:idad');
    $askAChosenU1->execute(array('idad'=>$_POST['idAdU1']));
}
?>

<?php
if(isset($_POST['logUser2']))
{
    //Get the information on the user to exchange with from the login
    $askUser2=$DB->prepare('SELECT * FROM user WHERE login=:loguser2');
        $askUser2->execute(array('loguser2'=>$_POST['logUser2']));
}
?>
<?php
if(isset($_POST['idUser2']))
{
    //Get the information on the user to exchange with from the Id
    $askUser2=$DB->prepare('SELECT * FROM user WHERE id=:iduser2');
        $askUser2->execute(array('iduser2'=>$_POST['idUser2']));
}
?>
<?php
if(isset($_POST ['idUser2']))
{
    //Get the house(s) of user 2 from the id
    $askHouseU2=$DB->prepare('SELECT * FROM house WHERE id_user=:iduser2');
        $askHouseU2->execute(array('iduser2'=>$_POST['idUser2']));
}
?>
<?php
if(isset($_POST ['logUser2']))
{
    //Get the house(s) of user 2 from the id
    $askHouseU2=$DB->prepare('SELECT * FROM house WHERE id_user=(SELECT id FROM user WHERE login=:loguser2)');
        $askHouseU2->execute(array('loguser2'=>$_POST['logUser2']));
}
?>
<?php
if(isset($_POST['idHouseU2']))
{
    //Get the information on the chosen house 
    $askHChosenU2=$DB->prepare('SELECT * FROM house WHERE id=:idhouse');
        $askHChosenU2->execute(array('idhouse'=>$_POST['idHouseU2']));
}
?>
<?php
if (isset($_POST['idHouseU2']))
{
    //Get the ad linked to the user2's house
    $askAdU2=$DB->prepare('SELECT * FROM ad WHERE id_house=:idhouse');
        $askAdU2->execute(array('idhouse'=>$_POST['idHouseU2']));
}
?>
<?php
if(isset($_POST['idAdU2']))
{
    //Get the information on the chosen ad
    $askAChosenU2=$DB->prepare('SELECT * FROM ad WHERE id=:idad');
    $askAChosenU2->execute(array('idad'=>$_POST['idAdU2']));
}
?>