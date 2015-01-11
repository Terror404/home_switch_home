<?php
if($_GET['state']===1)
{
    $askUser=$DB->prepare('SELECT picture, login, date_creation, rating FROM user WHERE user.login='.$_POST['name']);
    $askUser->execute();
    $askUserSite=$askUser;
}
elseif($_GET['state']===2)
{
    $askHouse=$DB->prepare('SELECT * FROM house WHERE house.id='.$_POST['id']);
    $askHouse->execute();
}
