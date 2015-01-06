<?php
//if admin adds a criterion
if($_GET['confirm']==='1')
{
    
    $req='INSERT INTO criteria(name,real_name,class) VALUES(\''.$_POST['name'].'\',\''.$_POST['realName'].'\',1)';
    $addSearchCriteria=$DB->prepare($req);
    $addSearchCriteria->execute();
}

//if admin deletes a criterion
if($_GET['confirm']==='2')
{
    
    $req='DELETE FROM criteria WHERE name=\''.$_POST['name'].'\'';
    $addSearchCriteria=$DB->prepare($req);
    $addSearchCriteria->execute();
}

$askSearchCriteria=$DB->prepare('SELECT * FROM criteria WHERE class=\'1\'');
$askSearchCriteria->execute();



