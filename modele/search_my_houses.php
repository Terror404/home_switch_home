<?php
$askHouse=$DB->prepare('SELECT * FROM house WHERE .id='.$_SESSION['userId']);
$askHouse->execute();
        
   
    

?>
