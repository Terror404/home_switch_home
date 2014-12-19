<?php
$askHouse=$DB->prepare('SELECT * FROM house WHERE id_user='.$_SESSION['userId']);
$askHouse->execute();
        
   
    

?>
