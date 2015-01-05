<?php
//if admin adds a criterion
if($_GET['confirm']==='1')
{
    
    $req='INSERT INTO criteria_house(name,real_name) VALUES(\''.$_POST['name'].'\',\''.$_POST['realName'].'\')';
    $addHouseCriteria=$DB->prepare($req);
    $addHouseCriteria->execute();
}

//if admin deletes a criterion
if($_GET['confirm']==='2')
{
    
    $req='DELETE FROM criteria_house WHERE name=\''.$_POST['name'].'\'';
    $addHouseCriteria=$DB->prepare($req);
    $addHouseCriteria->execute();
}

$askHouseCriteria=$DB->prepare('SELECT * FROM criteria_house');
$askHouseCriteria->execute();