<?php
    
    $askSearchBoxCriteriaHouse=$DB->prepare('SELECT * FROM criteria_house');
    $askSearchBoxCriteriaHouse->execute();
    
    $askSearchBoxCriteria=$DB->prepare('SELECT * FROM criteria WHERE class=\'1\'');
    $askSearchBoxCriteria->execute();
    
?>

