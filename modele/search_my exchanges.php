<?php

$askExchConf=$DB->prepare('SELECT * FROM house WHERE id_user_1=:iduser OR id_user_2=:iduser') ;
$askExchConf->execute(array('iduser'=>$_SESSION['userId']));

$askExchWait1=$DB->prepare('SELECT * FROM house WHERE id_user_1=:iduser OR id_user_2=:iduser') ;
$askExchWait1->execute(array('iduser'=>$_SESSION['userId']));

$askExchWait2=$DB->prepare('SELECT * FROM house WHERE id_user_1=:iduser OR id_user_2=:iduser') ;
$askExchWait2->execute(array('iduser'=>$_SESSION['userId']));