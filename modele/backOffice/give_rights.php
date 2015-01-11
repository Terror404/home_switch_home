<?php

if($_GET['state']==='1')
{
    
    $req='UPDATE user SET access='.$_POST['state'].' WHERE login=\''.$_POST['name'].'\'';
    $updateUserAccess=$DB->prepare($req);
    $updateUserAccess->execute();
}

$askAccessAdmin=$DB->prepare('SELECT * FROM user WHERE access=\'3\'');
$askAccessAdmin->execute();

$askAccessModerator=$DB->prepare('SELECT * FROM user WHERE access=\'2\'');
$askAccessModerator->execute();

$askAccessForumModerator=$DB->prepare('SELECT * FROM user WHERE access=\'1\'');
$askAccessForumModerator->execute();

