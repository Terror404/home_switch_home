<?php
    $askHouse=$DB->prepare('SELECT * FROM house WHERE id_user=:iduser');
        $askHouse->execute(array('iduser'=>$_SESSION['userId']));
?>
