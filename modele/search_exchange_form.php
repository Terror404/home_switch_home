<?php
//Get all the houses belonging to the current user
$askHouse=$DB->prepare('SELECT * FROM house WHERE id_user=:iduser');
    $askHouse->execute(array('iduser'=>$_SESSION['userId']));
?>
<?php
if(isset($_POST['houseChoice']))
{
    //Get the information on the chosen house 
    $askHChosen=$DB->prepare('SELECT * FROM house WHERE id=:idhouse');
        $askHChosen->execute(array('idhouse'=>$_POST['houseChoice']));
}
?>
<?php
if(isset($_POST['houseChoice']))
{
    //Get all the ad linked to the house
    $askAd=$DB->prepare('SELECT * FROM ad WHERE id_house=:idhouse');
    $askAd->execute(array('idhouse'=>$_POST['houseChoice']));
}
?>
<?php
if(isset($_POST['adChoice']))
{
    //Get the information on the chosen ad
    $askAChosen=$DB->prepare('SELECT * FROM ad WHERE id=:idad');
    $askAChosen->execute(array('idad'=>$_POST['adChoice']));
}
?>
<?php
if(isset($_POST['User2']))
{
    //Get the information on the user to exchange with
    $askUser2=$DB->prepare('SELECT * FROM user WHERE login=:loguser2');
        $askUser2->execute(array('loguser2'=>$_POST['User2']));
}
?>
<?php
if(isset($_POST ['User2']))
{
    //Get the house(s) of user 2
    $askHouseU2=$DB->prepare('SELECT * FROM house WHERE id_user=(SELECT id FROM user WHERE login=:loguser)');
        $askHouseU2->execute(array('loguser'=>$_POST['User2']));
}
?>
<?php
if(isset($_POST['houseChoiceU2']))
{
    //Get the information on the chosen house 
    $askHChosenU2=$DB->prepare('SELECT * FROM house WHERE id=:idhouse');
        $askHChosenU2->execute(array('idhouse'=>$_POST['houseChoiceU2']));
}
?>
<?php
if (isset($_POST['houseChoiceU2']))
{
    //Get the ad linked to the user2's house
    $askAdU2=$DB->prepare('SELECT * FROM ad WHERE id_house=:idhouse');
        $askAdU2->execute(array('idhouse'=>$_POST['houseChoiceU2']));
}
?>
<?php
if(isset($_POST['adChoiceU2']))
{
    //Get the information on the chosen ad
    $askAChosenU2=$DB->prepare('SELECT * FROM ad WHERE id=:idad');
    $askAChosenU2->execute(array('idad'=>$_POST['adChoiceU2']));
}
?>