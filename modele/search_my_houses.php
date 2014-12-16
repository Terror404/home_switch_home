<?php
    $askAreaHouse=$DB->prepare('SELECT A.real_name FROM area A,house H WHERE A.id=H.id_town AND H.id_user=:iduser');
        $askAreaHouse->execute(array('iduser'=>$_SESSION['userId']));
    
    $askTownHouse=$DB->prepare('SELECT V.ville_nom_reel FROM villes_france_free V,house H WHERE  H.id_town=V.ville_id AND H.id_user=:iduser');
        $askTownHouse->execute(array('iduser'=>$_SESSION['userId']));
    
    $askHouse=$DB->prepare('SELECT * FROM house WHERE id_user=:iduser');
        $askHouse->execute(array('iduser'=>$_SESSION['userId']));
        
   
    

?>
