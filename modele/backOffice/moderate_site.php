<?php
if($_GET['state']==1)
{
    $askUserBack=$DB->prepare('SELECT picture, login, date_creation, rating FROM user WHERE user.login=\''.$_POST['name'].'\'');
    $askUserBack->execute();
}
elseif($_GET['state']==2)
{
    $askHouse=$DB->prepare('SELECT * FROM house WHERE house.id='.$_POST['name']);
    $askHouse->execute();
}
elseif($_GET['state']==4)
{
    $askHouse=$DB->prepare('DELETE FROM house WHERE house.id=\''.$_POST['name'].'\'');
    $askHouse->execute();
    $askHouse=$DB->prepare('DELETE FROM house WHERE house.id=\''.$_POST['name'].'\'');
    $askHouse->execute();
    $askHouse=$DB->prepare('DELETE FROM house WHERE house.id=\''.$_POST['name'].'\'');
    $askHouse->execute();
    $askHouse=$DB->prepare('DELETE FROM house_criteria_house WHERE id_house=\''.$_POST['id'].'\'');
    $askHouse->execute();
    $askHouse=$DB->prepare('DELETE FROM house WHERE house.id=\''.$_POST['name'].'\'');
    $askHouse->execute();
    $askHouse=$DB->prepare('DELETE FROM user WHERE user.login=\''.$_POST['name'].'\'');
    $askHouse->execute();
    
}
elseif($_GET['state']==6)
{
    $askHouse=$DB->prepare('DELETE FROM house WHERE house.id=\''.$_POST['name'].'\'');
    $askHouse->execute();
}
