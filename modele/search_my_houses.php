<?php
$askHouse=$DB->prepare('SELECT * FROM house WHERE house.id='.$_SESSION['userId']);
$askHouse->execute();
        
   
    

?>
