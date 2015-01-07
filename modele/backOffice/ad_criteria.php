<?php
//if admin adds a criterion
if($_GET['confirm']==='1')
{
    
    $req='INSERT INTO criteria(name,real_name,class) VALUES(\''.$_POST['name'].'\',\''.$_POST['realName'].'\',0)';
    $addAdCriteria=$DB->prepare($req);
    $addAdCriteria->execute();
}

//if admin deletes a criterion
if($_GET['confirm']==='2')
{
    
    $req='DELETE FROM criteria WHERE name=\''.$_POST['name'].'\' AND class=0';
    $addAdCriteria=$DB->prepare($req);
    $addAdCriteria->execute();
}

$askAdCriteria=$DB->prepare('SELECT * FROM criteria WHERE class=\'0\'');
$askAdCriteria->execute();