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
elseif($_GET['state']==4 AND $_SESSION['userAccess']==3)
{
    
    $askHouse=$DB->prepare('DELETE FROM ad_criteria, criteria, criteria_house, house, comment_house, comment_user, favorite, user '
            . 'WHERE user.login=\''.$_POST['name'].'\''
            . ' AND user.id=house.id_user'
            . ' AND criteria_house.id_house=house.id'
            . ' AND ad.id_house=house.id'
            . ' AND ad_criteria.id_ad=ad.id'
            . ' AND comment_house.id_target=house.id'
            . ' AND comment_user.id_target=user.id'
            . ' AND favorite.id_house=house.id');
    echo 'DELETE FROM ad_criteria, criteria, criteria_house, house, comment_house, comment_user, favorite, user '
            . 'WHERE user.login=\''.$_POST['name'].'\''
            . ' AND user.id=house.id_user'
            . ' AND criteria_house.id_house=house.id'
            . ' AND ad.id_house=house.id'
            . ' AND ad_criteria.id_ad=ad.id'
            . ' AND comment_house.id_target=house.id'
            . ' AND comment_user.id_target=user.id'
            . ' AND favorite.id_house=house.id';
    $askHouse->execute();
    $askHouse=$DB->prepare('DELETE FROM ad_criteria, criteria, criteria_house, house, comment_house, comment_user, favorite, user '
            . 'WHERE user.login=\''.$_POST['name'].'\''
            . ' AND user.id=house.id_user'
            . ' AND criteria_house.id_house=house.id'
            . ' AND ad.id_house=house.id'
            . ' AND ad_criteria.id_ad=ad.id'
            . ' AND comment_house.id_author=user.id'
            . ' AND comment_user.id_author=user.id'
            . ' AND favorite.id_user=user.id');
    $askHouse->execute();
    
}
elseif($_GET['state']==6)
{
    $askHouse=$DB->prepare('DELETE FROM house WHERE house.id=\''.$_POST['name'].'\'');
    $askHouse->execute();
}
