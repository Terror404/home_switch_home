<?php
    $askAreaHouse=$DB->prepare('SELECT real_name FROM area WHERE id=(SELECT id_area FROM house WHERE id_user=:iduser');
        $askAreaHouse->execute(array('iduser'=>$_SESSION['userId']));
    
    $askTownHouse=$DB->prepare('SELECT ville_nom_reel FROM house WHERE ville_id=(SELECT id_town FROM house WHERE id_user=:iduser');
        $askTownHouse->execute(array('iduser'=>$_SESSION['userId']));
    
    $askHouse=$DB->prepare('SELECT * FROM house WHERE id_user=:iduser');
        $askHouse->execute(array('iduser'=>$_SESSION['userId']));
        
   
    

?>
