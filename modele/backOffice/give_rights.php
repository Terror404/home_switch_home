<?php

if($_GET['state']==='1' AND ($_SESSION['userAccess']==2 OR $_SESSION['userAccess']==3))
{
    if($_POST['state']==='3' AND $_SESSION['userAccess']==3)
    {
    $req='UPDATE user SET access='.$_POST['state'].' WHERE login=\''.$_POST['name'].'\'';
    $updateUserAccess=$DB->prepare($req);
    $updateUserAccess->execute();
    }
 else {
     $req='UPDATE user SET access='.$_POST['state'].' WHERE login=\''.$_POST['name'].'\'';
    $updateUserAccess=$DB->prepare($req);
    $updateUserAccess->execute();       
        
    }
}

$askAccessAdmin=$DB->prepare('SELECT * FROM user WHERE access=\'3\'');
$askAccessAdmin->execute();

$askAccessModerator=$DB->prepare('SELECT * FROM user WHERE access=\'2\'');
$askAccessModerator->execute();

$askAccessForumModerator=$DB->prepare('SELECT * FROM user WHERE access=\'1\'');
$askAccessForumModerator->execute();

