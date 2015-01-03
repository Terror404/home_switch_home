<?php

if(isset($_POST['idHouse']) AND isset($_POST['confDelHouse']))
{
    $delHouse=$DB->prepare('DELETE FROM house WHERE id=:idhouse');
        $delHouse->execute(array('idhouse'=>$_POST['idHouse']));
        
    $delAdHouse=$DB->prepare('DELETE FROM ad WHERE id_house=:idhouse');
        $delAdHouse->execute(array('idhouse'=>$_POST['idHouse']));
}
